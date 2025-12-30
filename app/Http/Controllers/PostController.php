<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
      $posts = Post::latest()->get();
   
      $image = null;

      if ($posts->count()) {
        $query = $posts[0]->category->name;

        $response = Http::get('https://api.unsplash.com/search/photos', [
          'query' => $query,
          'per_page' => 1,
          'orientation' => 'landscape',
          'client_id' => config('services.unsplash.key'),
        ]);

        $image = $response->json('results.0.urls.raw');
      }

      return view('posts', [
        "title" => "All Posts",
        // "posts" => Post::all()
        "posts" => $posts,
        'heroImage' => $image
      ]);
    }

    public function show(Post $post)
    {  
      $heroImage = null;

    if ($post->category) {
        $response = Http::get('https://api.unsplash.com/search/photos', [
            'query' => $post->category->name,
            'per_page' => 1,
            'orientation' => 'landscape',
            'client_id' => config('services.unsplash.key'),
        ]);

        $heroImage = $response->json('results.0.urls.raw');
    }

       return view('post', [
        "title" => "single Post",
        "post" => $post,
        "active" => 'posts',
        'heroImage' => $heroImage
      ]);
    }
}
