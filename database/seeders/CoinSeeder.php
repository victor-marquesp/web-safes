<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinSeeder extends Seeder
{

    public function run(): void {
        
        $data = [
            ['name' => '1 Real', 'currency_id' => 1, 'value_cents' => 100, 'icon_path' => 'coins/1-real.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '50 Centavos', 'currency_id' => 1, 'value_cents' => 50, 'icon_path' => 'coins/50-cents.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '25 Centavos', 'currency_id' => 1, 'value_cents' => 25, 'icon_path' => 'coins/25-cents.png', 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('coins')->insert($data);
    }
}
