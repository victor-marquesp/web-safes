<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

    public function run() : void {
        
        $data = [
            [
                'name' => 'Admin',
                'is_admin' => true,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('@1234@5678')
            ],
            [
                'name' => 'User',
                'is_admin' => false,
                'email' => 'user@gmail.com',
                'password' => Hash::make('@1234@5678')
            ],
            [
                'name' => 'Victor', 
                'email' => 'victor.pecine.marquespr@gmail.com', 
                'is_admin' => true,
                'password' => Hash::make('@1234@5678')
            ],
        ];

        DB::table('users')->insert($data);

    }
}
