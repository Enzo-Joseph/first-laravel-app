<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/blog', function () {
    // dd([PostController::class, 'index']);
    return view('blog', ['title' => 'Blog Page', 'posts' => Post::all()]);
});

Route::get('/blog/{id}', function ($id) {
    return view('blog-post', ['title' => 'Single Post', 'post' => Post::find($id)]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});


