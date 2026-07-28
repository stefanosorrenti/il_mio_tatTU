<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //Aggiungo dati fittizi
            for ($i = 0; $i < 10; $i++) {
                $newArtist = new Artist();

                $newArtist->name = $faker->name();
                $newArtist->surname = $faker->lastName(); 
                $newArtist->bio = $faker->paragraph();
                $newArtist->age = $faker->numberBetween(20, 60);
                $newArtist->nationality_id = $faker->numberBetween(1, 68);

                $newArtist->save();
            }
    }
}
