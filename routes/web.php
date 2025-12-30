<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Http;

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

    $categories = Category::all();

    foreach ($categories as $category) {

        $response = Http::get('https://api.unsplash.com/search/photos', [
            'query' => $category->name,
            'per_page' => 1,
            'orientation' => 'landscape',
            'client_id' => config('services.unsplash.key'),
        ]);

        $category->image = $response->json('results.0.urls.raw');
    }

     return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => $categories
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){

    $posts = $category->posts->load('category', 'author'); // satu category bisa banyak post
    $heroImage = null;

    if ($posts->count()) {
        $query = $posts[0]->category->name;
        $response = Http::get('https://api.unsplash.com/search/photos', [
            'query' => $query,
            'per_page' => $posts->count(), // ambil random gambar
            'orientation' => 'landscape',
            'client_id' => config('services.unsplash.key'),
        ]);

        $heroImage = $response->json('results.0.urls.raw');
    }


    return view('posts', [
        'title' => "Post by Category : $category->name",
        'posts' => $posts,
        'active' => 'categories',
        'heroImage' => $heroImage
        
    ]);
});

Route::get('/authors/{author:username}', function(User $author) {
    return view('posts', [
        'title' => "Post by Author : $author->name",
        'posts' => $author->posts->load('category', 'author'), // satu author bisa banyak post
    ]);
});

Route::get('/authors-sub/{author:username}', function(User $author) {

    $posts = $author->posts->load('category', 'author');

    $heroImage = null;

    if ($posts->count()) {
        $query = $posts[0]->category->name;
        $response = Http::get('https://api.unsplash.com/search/photos', [
            'query' => $query,
            'per_page' => $posts->count(), // ambil random gambar
            'orientation' => 'landscape',
            'client_id' => config('services.unsplash.key'),
        ]);

        $heroImage = $response->json('results.0.urls.raw');
    }

    return view('posts', [
        'title' => "Post by Author : $author->name",
        'posts' => $posts,
        'active' => 'categories',
        'heroImage' => $heroImage
    ]);
});