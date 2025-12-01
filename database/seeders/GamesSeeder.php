<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('games')->insert([
            [
                'id' => 1,
                'title' => 'Borderlands 4',
                'genre' => 'First-person shooter, action role-playing',
                'description' => 'loot and shoot',
                'image_url' => 'games/Hy4gpnvlCIbdnC2qSlr6rsHLwiyPHO2g0DRsVhfY.jpg',
                'release_year' => 2025,
                'rating' => 8.5,
                'created_at' => '2025-11-25 11:12:46',
                'updated_at' => '2025-11-25 11:12:46'
            ],
            [
                'id' => 2,
                'title' => 'Black myth wukong',
                'genre' => 'Action role-playing',
                'description' => 'aap met een staf',
                'image_url' => 'games/hGlZ0AOQGWgoa5SqefrAvlLr98PKmfNjgA55h6i7.jpg',
                'release_year' => 2024,
                'rating' => 10,
                'created_at' => '2025-11-25 11:13:26',
                'updated_at' => '2025-11-25 11:13:26'
            ],
            [
                'id' => 3,
                'title' => 'ARC raiders',
                'genre' => 'Third-person shooter',
                'description' => 'ARC Raiders is a 2025 third-person extraction shooter.',
                'image_url' => 'games/6YLZFc1PezpwxM5WmrPvs4v4KSb6f6guKrk7clby.jpg',
                'release_year' => 2025,
                'rating' => 9.3,
                'created_at' => '2025-11-25 17:17:25',
                'updated_at' => '2025-11-25 17:17:25'
            ],
            [
                'id' => 4,
                'title' => 'Diablo IV',
                'genre' => 'Action role-playing, hack and slash',
                'description' => 'Diablo IV is a 2023 action role-playing game developed by Blizzard.',
                'image_url' => 'games/hw651BcDVjAFlBZq8O6ts96KORdaQR2c2rhshdj0.jpg',
                'release_year' => 2023,
                'rating' => 9.2,
                'created_at' => '2025-11-25 17:50:45',
                'updated_at' => '2025-11-25 17:50:45'
            ],
            [
                'id' => 5,
                'title' => "Marvel's Spider-Man 2",
                'genre' => 'Action-adventure',
                'description' => "Marvel's Spider-Man 2 is a 2023 action-adventure game.",
                'image_url' => 'games/vTHb4d6rA3kD4HTyGupU0gW7eP2aycfx4PauTMeb.jpg',
                'release_year' => 2023,
                'rating' => 9.5,
                'created_at' => '2025-11-25 17:55:12',
                'updated_at' => '2025-11-25 17:55:12'
            ],
            [
                'id' => 6,
                'title' => 'God of War: Ragnarök',
                'genre' => 'Action-adventure, hack and slash',
                'description' => 'God of War Ragnarök is a 2022 action-adventure game.',
                'image_url' => 'games/4t0tlJkpRXhG2IcCp6Utrn2ZFE3ryUUYccmgg3DD.jpg',
                'release_year' => 2022,
                'rating' => 9.4,
                'created_at' => '2025-11-25 17:58:15',
                'updated_at' => '2025-11-25 17:58:15'
            ],
        ]);
    }
}
