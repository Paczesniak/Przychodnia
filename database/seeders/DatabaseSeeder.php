<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PacjentSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(LekarzSeeder::class);
        $this->call(AptekaSeeder::class);
        $this->call(LekarstwoSeeder::class);
        $this->call(ChorobaSeeder::class);
        $this->call(WizytaSeeder::class);

    }
}
