<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->badges as $badge) {
            $badge = Badge::factory()->create(['name' => $badge]);
            $blog = Blog::inRandomOrder()->first();
            $blog->badges()->attach($badge);
        }
    }

    private array $badges = [
        'PHP',
        'Javascript',
        'Typescript',
        'Laravel',
        'React',
        'Vue',
        'Angular',
        'Perl',
        'Devops',
        'Java',
        'Microsoft',
        'Google',
        'FAANG',
        'Algorithm',
        'AI',
        'Rust',
        'Linux',
        'Azure',
        'AWS',
        'Lambda',
        'EC2',
        'Production',
        'Staging'
    ];
}
