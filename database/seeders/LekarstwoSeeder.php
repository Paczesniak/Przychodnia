<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LekarstwoSeeder extends Seeder
{
    public function run()
    {
        DB::table('lekarstwo')->insert([
            [
                'nazwa' => 'Paracetamol',
                'dostepnosc' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Ibuprofen',
                'dostepnosc' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nazwa' => 'Antybiotyk',
                'dostepnosc' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
