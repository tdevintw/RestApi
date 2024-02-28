<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       
            User::factory()
            ->count(50)
            ->hasTasks(10)
            ->create();
    
            User::factory()
            ->count(20)
            ->hasTasks(5)
            ->create();
    
            User::factory()
            ->count(10)
            ->create();
        
    }
}
