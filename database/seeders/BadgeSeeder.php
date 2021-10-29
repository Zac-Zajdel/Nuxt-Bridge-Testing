<?php

namespace Database\Seeders;

use App\Models\Badge;
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
            Badge::factory()->create(['name' => $badge]);
        }

        // TODO - Add association to blogs with badgable
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
        'Data Structures',
        'AI',
        'Rust',
        'Linux',
        'Azure',
        'Amazon Web Servies',
        'Lambda',
        'EC2',
        'Production',
        'Staging'
    ];
}
