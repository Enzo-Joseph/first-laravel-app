<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Enzo Joseph',
            'username' => 'enzojsph',
            'email' => 'enzojoseph@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_admin' => true,
            'remember_token' => Str::random(10),
        ]);

        User::factory(10)->create();
    }
}
