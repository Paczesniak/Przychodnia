<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LekarzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = [];

        $userIds[] = DB::table('users')->insertGetId([
            'name' => 'Jan Kowalski',
            'email' => 'jan.kowalski@example.com',
            'password' => Hash::make('password'),
            'role' => 'lekarz',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $userIds[] = DB::table('users')->insertGetId([
            'name' => 'Anna Nowak',
            'email' => 'anna.nowak@example.com',
            'password' => Hash::make('password'),
            'role' => 'lekarz',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $userIds[] = DB::table('users')->insertGetId([
            'name' => 'Piotr Zielinski',
            'email' => 'piotr.zielinski@example.com',
            'password' => Hash::make('password'),
            'role' => 'lekarz',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('lekarz')->insert([
            [
                'user_id' => $userIds[0],
                'imie' => 'Jan',
                'nazwisko' => 'Kowalski',
                'telefon' => '123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userIds[1],
                'imie' => 'Anna',
                'nazwisko' => 'Nowak',
                'telefon' => '987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userIds[2],
                'imie' => 'Piotr',
                'nazwisko' => 'Zielinski',
                'telefon' => '456789123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

