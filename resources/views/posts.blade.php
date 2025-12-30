@extends('layouts.main')

@section('container')
    <h1 class=mb-5>{{ $title }}</h1>

    <!-- cek postingan dan hitung jumlah postingan -->
    @if ($heroImage)
        <div class="card mb-3">
            @if ($heroImage)
                <img src="{{ $heroImage }}&w=1200&h=400&fit=crop" class="card-img-top"
                    alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body text-center">
                <h3 class="card-title">
                    <a href="/posts/{{ $posts[0]->slug }}"class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                </h3>
                <p>
                    <small class="text-muted">
                        By. <a href="/authors-sub/{{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                            href="/categories/{{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>

            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found</p>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4">
                    <div class="card">
                        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
                            <a href="/categories/{{ $post->category->slug }}"
                                class="text-white text-decoration-none">{{ $post->category->name }}</a>
                        </div>
                        <img src="{{ $heroImage }}&w=500&h=400&fit=crop" class="card-img-top"
                            alt="{{ $post->category->name }}">
                        <div class="card-body">
                            <h5 class="card-title"><a
                                    href="/posts/{{ $post->slug }}"class="text-decoration-none text-dark">{{ $post->title }}</a>
                            </h5>
                            <p>
                                <small class="text-muted"> By. <a href="/authors-sub/{{ $post->author->username }}"
                                        class="text-decoration-none">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Red more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
