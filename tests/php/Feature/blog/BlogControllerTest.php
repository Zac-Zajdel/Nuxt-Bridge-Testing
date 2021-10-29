<?php

namespace Tests\Feature\blog;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class BlogControllerTest extends TestCase
{
    private static bool $populated = false;
    private static User $user;
    private static Blog $blog;

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

            Blog::factory(10)
                ->for(self::$user)
                ->create();

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
                '/user/' . self::$user->id . "/blog"
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
                            ->has('title')
                            ->has('user_id')
                            ->has('body')
                            ->has('draft')
                            ->has('published_at')
                            ->has('created_at')
                            ->has('updated_at')
                            ->has('deleted_at')
                            ->has('user')
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
                '/user/' . self::$user->id . "/blog",
            );

        // Validate Response Structure
        self::$blog = Blog::latest()->first();
        $result->assertJson(
            [
                'status' => 'success',
                'data' => [
                    'success' => true,
                    'message' => __('blog.created', ['name' => self::$blog->name]),
                ],
            ]
        );
    }

    /**
     * Test HTTP PUT request update() method
     */
    public function testUpdate()
    {
        self::$blog = Blog::latest()->first();
        $title = 'Changed Title';
        $body = 'Changed Body';

        // Fake HTTP
        $result = $this->actingAs(self::$user)
            ->json(
                'put',
                '/user/' . self::$user->id . "/blog/" . self::$blog->id,
                [
                    'title' => $title,
                    'body' => $body,
                    'draft' => false,
                ],
            );
        self::$blog->refresh();

        // Validate Response Structure
        $this->assertTrue(self::$blog->title === $title);
        $this->assertTrue(self::$blog->body === $body);
        $this->assertTrue(self::$blog->draft === false);
        $this->assertTrue(self::$blog->published_at !== null);

        $result->assertJson(
            [
                'status' => 'success',
                'data' => [
                    'success' => true,
                    'message' => __('blog.updated', ['name' => self::$blog->name]),
                ],
            ]
        );
    }

    /**
     * Test HTTP DELETE request destory() method
     */
    public function testDestroy()
    {
        self::$blog = Blog::latest()->first();
        $name = self::$blog->name;

        // Fake HTTP
        $result = $this->actingAs(self::$user)
            ->json(
                'delete',
                '/user/' . self::$user->id . "/blog/" . self::$blog->id,
            );

        // Validate Response Structure
        $this->assertSoftDeleted(self::$blog);
        $result->assertJson(
            [
                'status' => 'success',
                'data' => [
                    'success' => true,
                    'message' => __('blog.deleted', ['name' => $name]),
                ],
            ]
        );
    }
}
