<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $user = User::create([
        //     'name' => 'Enzo Joseph',
        //     'username' => 'enzojsph',
        //     'email' => 'enzojoseph@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'is_admin' => true,
        //     'remember_token' => Str::random(10),
        // ]);

        // Post::factory(100)->recycle([
        //     Category::factory(3)->create(),
        //     $user,
        //     User::factory(10)->create(),
        // ])->create();


        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
        ]);

        Post::factory(100)->recycle([
            Category::all(),
            User::all(),
        ])->create();
    }
}
