<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    User::create([
        'name' =>'Masato',
        'email'=>'qcomekukumi@gmail.com',
        'password'=>'8888',
        'profile_picture'=> 'aaaaa111111'
        ]);
    }
}

  
