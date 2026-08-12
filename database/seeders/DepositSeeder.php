<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepositSeeder extends Seeder {

    public function run(): void {
        
        $data = [
            [
                'safe_id' => 2,
                'coin_id' => null,
                'quantity' => null,
                'value_cents' => 100000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'safe_id' => 3,
                'coin_id' => null,
                'quantity' => null,
                'value_cents' => 1250000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'safe_id' => 1,
                'coin_id' => 1,
                'quantity' => 1,
                'value_cents' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'safe_id' => 1,
                'coin_id' => 2,
                'quantity' => 1,
                'value_cents' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];


        DB::table('deposits')->insert($data);
    }
}
