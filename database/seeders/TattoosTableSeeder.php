<?php

namespace Database\Seeders;

use App\Models\Tattoo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class TattoosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //Aggiungo dei dati fittizi
        for ($i = 0; $i < 10; $i++) {

            $newTattoo = new Tattoo();
            $newTattoo->title = $faker->sentence(3);
            $newTattoo->description = $faker->paragraph();
            $newTattoo->image_path = $faker->url();
            $newTattoo->price = $faker->randomFloat(2, 50, 500);
            $newTattoo->time = $faker->numberBetween(1, 50);   
            $newTattoo->artist_id = $faker->numberBetween(1, 10);  

            $newTattoo->save();
        }

    }
}
