<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WizytaSeeder extends Seeder
{
    public function run()
    {
        DB::table('wizyta')->insert([
            [
                'id_pacjent' => 1,
                'id_lekarz' => 1,
                'data_wizyty' => '2023-01-10',
                'opis' => 'Regular checkup',
                'choroba_id' => 1,
                'leczenie_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pacjent' => 2,
                'id_lekarz' => 2,
                'data_wizyty' => '2023-02-05',
                'opis' => 'Flu symptoms',
                'choroba_id' => 2,
                'leczenie_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pacjent' => 3,
                'id_lekarz' => 3,
                'data_wizyty' => '2023-03-15',
                'opis' => 'Headache and nausea',
                'choroba_id' => 3,
                'leczenie_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
