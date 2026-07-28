<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ArtistsTableSeeder;
use Database\Seeders\NationalitiesTableSeeder;
use Database\Seeders\StylesTableSeeder;
use Database\Seeders\TattoosTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        $this->call([
            NationalitiesTableSeeder::class,
            ArtistsTableSeeder::class,
            StylesTableSeeder::class,
            TattoosTableSeeder::class,
        ]);
    }
}
