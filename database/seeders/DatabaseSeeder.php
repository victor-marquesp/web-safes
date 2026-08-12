<?php

namespace Database\Seeders;

// use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\DepositSeeder;
use Database\Seeders\CurrencySeeder;
use Database\Seeders\CoinSeeder;
use Database\Seeders\AnimalSeeder;
use Database\Seeders\SafeSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(CurrencySeeder::class);
        $this->call(CoinSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(SafeSeeder::class);
        $this->call(DepositSeeder::class);
    }
}
