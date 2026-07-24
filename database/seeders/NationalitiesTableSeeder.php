<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nationality;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $nationalities = [
            'Italian',
            'American',
            'French',
            'German',
            'Spanish',
            'British',
            'Canadian',
            'Australian',
            'Japanese',
            'Chinese',
            'Indian',
            'Brazilian',
            'Mexican',
            'Russian',
            'South African',
            'Argentinian',
            'Swedish',
            'Norwegian',
            'Dutch',
            'Belgian',
            'Swiss',
            'Danish',
            'Finnish',
            'Polish',
            'Portuguese',
            'Greek',
            'Turkish',
            'Egyptian',
            'Saudi Arabian',
            'Korean',
            'Thai',
            'Vietnamese',
            'Indonesian',
            'Filipino',
            'Malaysian',
            'Singaporean',
            'New Zealander',
            'Irish',
            'Scottish',
            'Welsh',
            'Czech',
            'Hungarian',
            'Romanian',
            'Bulgarian',
            'Croatian',
            'Serbian',
            'Slovak',
            'Slovenian',
            'Ukrainian',
            'Belarusian',
            'Lithuanian',
            'Latvian',
            'Estonian',
            'Icelandic',
            'Albanian',
            'Macedonian',
            'Montenegrin',
            'Bosnian',
            'Kosovar',
            'Maltese',
            'Cypriot',
            'Georgian',
            'Armenian',
            'Azerbaijani',
            'Kazakh',
            'Uzbek',
            'Turkmen',
            'Kyrgyz',   
        ];

        foreach ($nationalities as $nationality) {
            $newNationality = new Nationality();
            $newNationality->name = $nationality;
            $newNationality->save();
        }
    }
}
