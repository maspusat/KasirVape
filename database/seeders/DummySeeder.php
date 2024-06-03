<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=500; $i < 9500; $i++){
            User::create([
                'name' => 'User ke'.$i,
                'email' => 'user'.$i. '@test.com',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
