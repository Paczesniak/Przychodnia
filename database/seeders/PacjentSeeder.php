<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pacjent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PacjentSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Michał Szukała',
            'email' => 'michal.szukala@example.com',
            'password' => Hash::make('password'),
            'role' => 'pacjent',
        ]);

        Pacjent::create([
            'user_id' => $user->id,
            'imie' => 'Michał',
            'nazwisko' => 'Szukała',
            'pesel' => '12345678901',
            'telefon' => '123456789',
            'data_urodzenia' => '1980-01-01',
        ]);

        $user2 = User::create([
            'name' => 'Adrian Skowroński',
            'email' => 'adrian.skowronski@example.com',
            'password' => Hash::make('password'),
            'role' => 'pacjent',
        ]);

        Pacjent::create([
            'user_id' => $user2->id,
            'imie' => 'Adrian',
            'nazwisko' => 'Skowroński',
            'pesel' => '98765432109',
            'telefon' => '987654321',
            'data_urodzenia' => '1990-05-15',
        ]);
    }
}
