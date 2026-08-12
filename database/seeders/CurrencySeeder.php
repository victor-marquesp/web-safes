<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder {

    public function run(): void {
        
        $data = [
            ['name' => 'Real', 'description' => 'Moeda Brasileira', 'icon_path' => 'currencies/real.png'],
            ['name' => 'Dólar', 'description' => 'Lastro Global', 'icon_path' => 'currencies/dollar.png'],
            ['name' => 'Libra', 'description' => null, 'icon_path' => 'currencies/pound.png'],
        ];

        DB::table('currencies')->insert($data);
    }
}
