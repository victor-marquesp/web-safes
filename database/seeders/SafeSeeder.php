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
            [
                'name' => 'Piggy Safe', 
                'animal_id' => 2, 
                'currency_id' => 1, 
                'description' => 'My First Safe!!!', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Turtle Safe', 
                'animal_id' => 3, 
                'currency_id' => 1, 
                'description' => null, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'Regular Safe', 
                'animal_id' => 1, 
                'currency_id' => 2, 
                'description' => null, 
                'created_at' => now(), 
                'updated_at' => now()
            ]
        ];

        DB::table('safes')->insert($data);
    }
}
