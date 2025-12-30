<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

use App\Models\User;
use App\Models\Category;

Route::get('/', function () {
    return view('home', [
        "title" => "Home",          
        "greeting" => "selamat datang di halaman home",
        "content" => "Ini adalah konten halaman home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Rifky",
        "email" => "rifkynurdiansyah@gmail.com",
        "image" => "avatar.png"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
     return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        'title' => "Post by Category : $category->name",
        'posts' => $category->posts->load('category', 'author'), // satu category bisa banyak post
    ]);
});

Route::get('/authors/{author:username}', function(User $author) {
    return view('posts', [
        'title' => "Post by Author : $author->name",
        'posts' => $author->posts->load('category', 'author') // satu author bisa banyak post
    ]);
});