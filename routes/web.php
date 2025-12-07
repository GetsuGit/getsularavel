<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "tittle" => "Home",          

        "greeting" => "selamat datang di halaman home",
        "content" => "Ini adalah konten halaman home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "tittle" => "About",

        "name" => "Rifky",
        "email" => "rifkinurdiansyah@gmail.com",
        "image" => "avatar.png"
    ]);
});

Route::get('/blog', function () {

    $blog_posts = [ 
    [
      "tittle" => "Judul Post Pertama",
      "slug" => "judul-post-pertama",
      "author" => "GETSU",
      "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, s
       ed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
       Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
       nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
       reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
       Excepteur sint occaecat cupidatat non proident, sunt in culpa 
       qui officia deserunt mollit anim id est laborum."
    ],
    [
      "tittle" => "Judul Post Kedua",
      "slug" => "judul-post-kedua",
      "author" => "Nina",
      "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, s
       ed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
       Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
       nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
       reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
       Excepteur sint occaecat cupidatat non proident, sunt in culpa 
       qui officia deserunt mollit anim id est laborum."
    ],
];

    return view('posts', [
        "tittle" => "Posts",
        "posts" => $blog_posts
    ]);
});

// halaman single post
Route::get('posts/{slug}', function($slug){

    $blog_posts = [ 
    [
      "tittle" => "Judul Post Pertama",
      "slug" => "judul-post-pertama",
      "author" => "GETSU",
      "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, s
       ed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
       Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
       nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
       reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
       Excepteur sint occaecat cupidatat non proident, sunt in culpa 
       qui officia deserunt mollit anim id est laborum."
    ],
    [
      "tittle" => "Judul Post Kedua",
      "slug" => "judul-post-kedua",
      "author" => "Nina",
      "body" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, s
       ed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
       Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
       nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
       reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
       Excepteur sint occaecat cupidatat non proident, sunt in culpa 
       qui officia deserunt mollit anim id est laborum."
    ],
];
    
    $new_post = [];
    foreach($blog_posts as $post){
       if($post["slug"] === $slug){
        $new_post = $post;
       }
    }

    return view('post', [
        "tittle" => "single Post",
        "post" => $new_post
    ]);
});