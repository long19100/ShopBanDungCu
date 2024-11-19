<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
       DB::table('users')->insert(
       
      
       [
        'name' => 'Nguyễn Nhật Long',
        'email' => 'admin@gmail.com',
        'phone' => '0943372256',
        'address' => 'Hà Tĩnh',
        'password' => Hash::make('123456') ,
        'role_as' => '1',
        'created_at' => now(),
    ]
    );
    }
}
