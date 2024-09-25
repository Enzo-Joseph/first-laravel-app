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
        // User::factory(10)->create();


        // Post::create([
        //     'title' => 'My First Post',
        //     'slug' => 'my-first-post',
        //     'body' => 'This is the body of my first post',
        //     'author_id' => 1,
        //     'category_id' => 1,
        // ]);
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
