@extends('layouts.main')

@section('container')

<div class="container" style="margin-top:120px">
    <div class="posts-header text-center">
        <h1 class="posts-header-title">BERITA</h1>
        <p class="posts-header-copy">Berita terkini dan terpercaya mengenai keamanan siber, insiden digital, serta langkah-langkah respons kami dalam menjaga dunia maya tetap aman.</p>
    </div>

    <div class="row justify-content-center my-4">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control posts-search-input" placeholder="Search..." aria-label="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn posts-search-btn" type="submit" >Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card my-4 featured-article-card">
            <div class="featured-article-media">
                <span class="article-card-category"><a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a></span>
                <img src="{{ Storage::url($posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid featured-article-image">
            </div>
            
            <div class="card-body featured-article-body text-center">
                <h3 class="card-title featured-article-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">{{ $posts[0]->title }}</a></h3>
                    <p class="article-card-meta">
                        <small>
                        By <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> at <span>{{ date('F d, Y', strtotime($posts[0]->created_at)) }}</span> 
                        </small>
                    </p>
                <p class="card-text article-card-text">{{ $posts[0]->excerpt }}</p>

                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn article-card-btn">Read more</a>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="card-effect article-card">
                            <div class="article-card-media">
                                <span class="article-card-category"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></span>
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->category->name }}" >
                            </div>

                            <div class="card-body article-card-body">
                            <h5 class="card-title article-card-title"><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h5>
                            <p class="article-card-meta">
                                <small>
                                By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> at <span>{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                                </small>
                            </p>
                            <p class="card-text article-card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn article-card-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    @else
        <p class="text-center fs-4">No Post Found</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
        
</div>
@endsection
