<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder {

    public function run(): void {
        
        $data = [
            [
                'name' => 'Real', 
                'description' => 'Moeda Brasileira', 
                'icon_path' => 'currencies/real.png', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Dólar', 
                'description' => 'Lastro Global', 
                'icon_path' => 'currencies/dollar.png', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Libra', 
                'description' => null, 
                'icon_path' => 'currencies/pound.png', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ];

        DB::table('currencies')->insert($data);
    }
}
