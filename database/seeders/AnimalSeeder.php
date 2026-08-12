<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder {

    public function run(): void {
        
        $data = [
            [
                'name' => 'safe', 
                'description' => 'default', 
                'icon_path' => 'animals/safe.png', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'piggy', 
                'description' => 'the classic one', 
                'icon_path' => 'animals/piggy.png', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'turtle', 
                'description' => null, 
                'icon_path' => 'animals/turtle.png', 
                'created_at' => now(), 
                'updated_at' => now()
            ]
        ];

        DB::table('animals')->insert($data);

    }
}
