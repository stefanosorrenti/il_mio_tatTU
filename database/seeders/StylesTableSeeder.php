<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Aggiungo dati essenziali

        $tattoStyles = [
            'Realistico',
            'Tradizionale',
            'Giapponese',
            'Tribal',
            'Acquerello',
            'Minimalista',
            'Geometrico',
            'Surrealista',
            'Lettering',
            'New School',
        ];

        foreach ($tattoStyles as $styleName) {
            $newStyle = new Style();
            $newStyle->name = $styleName;
            
            $newStyle->save();
        }
    }
}
