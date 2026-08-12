<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SafeSeeder extends Seeder
{

    public function run(): void
    {

        $data = [
            ['name' => 'Piggy Safe', 'animal_id' => 2, 'currency_id' => 1, 'savings' => 500, 'description' => 'My First Safe!!!'],
            ['name' => 'Turtle Safe', 'animal_id' => 3, 'currency_id' => 1, 'savings' => 5000, 'description' => null],
            ['name' => 'Regular Safe', 'animal_id' => 1, 'currency_id' => 2, 'savings' => 0, 'description' => null]
        ];

        DB::table('safes')->insert($data);
    }
}
