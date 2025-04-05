<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AptekaSeeder extends Seeder
{
    public function run()
    {
        DB::table('apteka')->insert([
            [
                'miasto' => 'Warszawa',
                'ulica' => 'Marszałkowska',
                'numer' => '10',
                'telefon' => '123456789',
                'email' => 'apteka1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'miasto' => 'Kraków',
                'ulica' => 'Floriańska',
                'numer' => '15',
                'telefon' => '987654321',
                'email' => 'apteka2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'miasto' => 'Gdańsk',
                'ulica' => 'Długa',
                'numer' => '5',
                'telefon' => '555666777',
                'email' => 'apteka3@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
