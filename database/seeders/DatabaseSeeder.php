<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    use WithoutModelEvents;

    public function run() : void {

        $this->call(UserSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(CoinSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(SafeSeeder::class);
        $this->call(DepositSeeder::class);
    }
}
