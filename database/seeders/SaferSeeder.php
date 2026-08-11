<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaferSeeder extends Seeder
{

    public function run(): void
    {

        $data = [
            ['name' => 'Piggy Safe', 'animal_id' => 2, 'savings' => 500, 'description' => 'My First Safe!!!'],
            ['name' => 'Turtle Safe', 'animal_id' => 3, 'savings' => 5000, 'description' => null],
            ['name' => 'Regular Safe', 'animal_id' => 1, 'savings' => 0, 'description' => null]
        ];

        DB::table('safers')->insert($data);
    }
}
