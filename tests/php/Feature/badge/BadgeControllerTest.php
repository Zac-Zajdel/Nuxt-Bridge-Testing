<?php

namespace Tests\Feature\badge;

use App\Models\Badge;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class BadgeControllerTest extends TestCase
{
    private static bool $populated = false;
    private static User $user;
    private static Blog $blog;
    private static Badge $badge;

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Setup Feature Test
     */
    public function setUp(): void
    {
        parent::setUp();

        if (!self::$populated) {
            Artisan::call('migrate:fresh');

            self::$user = User::factory()
                ->create([
                    'admin' => true,
                ])
                ->first();

            self::$blog = Blog::factory()
                ->for(self::$user)
                ->create();

            self::$badge = Badge::factory()->create([
              'name' => 'Laravel',
            ]);

            self::$populated = true;
        }
    }

    /**
     * Test HTTP GET request index() method
     */
    public function testIndex()
    {
        // Fake HTTP
        $result = $this->actingAs(self::$user)
            ->json(
                'get',
                '/user/' . self::$user->id . "/badge",
                ['search' => 'Laravel'],
            );

        // Validate Response Structure
        $result
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('status', 'success')
                    ->has('paginate')
                    ->has('benchmark')
                    ->has('query')
                    ->has('data')
                    ->has('data.0', fn ($blog) =>
                        $blog->has('id')
                            ->has('name')
                            ->has('created_at')
                            ->has('updated_at')
                            ->etc()));
    }

    /**
     * Test HTTP POST request store() method
     */
    public function testStore()
    {
        // Fake HTTP
        $result = $this->actingAs(self::$user)
            ->json(
                'post',
                '/user/' . self::$user->id . "/badge",
                [
                  'name' => 'PHP',
                  'model' => 'blogs',
                  'model_id' => self::$blog->id,
                ],
            );

        // Assert that a new badge has been created
        self::$badge = Badge::orderByDesc('id')->first();
        $this->assertTrue(self::$badge->name === 'PHP');

        // Assert badge has been associated to blog
        $this->assertTrue(self::$blog->badges->count() === 1);

        // Validate Response Structure
        $result->assertJson(
            [
                'status' => 'success',
                'data' => [
                    'success' => true,
                    'message' => __('badge.associated', [
                      'name' => 'PHP',
                      'model' => 'blog',
                    ]),
                ],
            ]
        );
    }

    /**
     * Test HTTP DELETE request destory() method
     */
    public function testDestroy()
    {
        // Fake HTTP
        $result = $this->actingAs(self::$user)
            ->json(
                'delete',
                '/user/' . self::$user->id . "/badge/" . self::$badge->id,
                [
                  'model' => 'blogs',
                  'model_id' => self::$blog->id,
                ],
            );

        // Assert badge has been removed from blog
        self::$blog->refresh();
        $this->assertTrue(self::$blog->badges->count() === 0);

        // Validate Response Structure
        $result->assertJson(
            [
                'status' => 'success',
                'data' => [
                    'success' => true,
                    'message' => __('badge.removed', [
                      'name' => 'PHP',
                      'model' => 'blog',
                    ]),
                ],
            ]
        );
    }
}
