<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog Page', 'posts' => Post::all()]);
});

Route::get('/blog/{post:slug}', function (Post $post) {
    return view('blog-post', ['title' => 'Single Post', 'post' => Post::find($post->id)]);
});

Route::get('/author/{user:username}', function (User $user) {
    return view('blog', ['title' => 'Articles by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view('blog', ['title' => 'Articles in ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});


