<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChorobaSeeder extends Seeder
{
    public function run()
    {
        $choroby = [
            ['nazwa' => 'Grypa'],
            ['nazwa' => 'Angina'],
            ['nazwa' => 'COVID-19'],
            ['nazwa' => 'Ospa wietrzna'],
            ['nazwa' => 'Cukrzyca'],
        ];

        DB::table('choroba')->insert($choroby);
    }
}
