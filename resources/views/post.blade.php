@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <p>By. <a href="/authors/{{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in
                    <a href="/categories/{{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </p>
                @if ($heroImage)
                    <img src="{{ $heroImage }}&w=1200&h=400&fit=crop" alt="{{ $post->category->name }}"
                        class="card-img-top img-fluid">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!} <!-- jika ingin menambahkan p html -->
                </article>

                <a href="/posts" class="d-block mt-3"> Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
