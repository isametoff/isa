@extends('layouts.main')
@section('title', 'Посты')
@section('content')
    <main class="blog">
        <div class="container">
            <h3 class="edica-page-title" data-aos="fade-up">Блог</h3>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ Storage::url($post->main_image) }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            @auth
                                <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-sm float-right"><i
                                            @if (auth()->user()->likedPosts->contains($post->id)) class="fas fa-thumbs-up"></i>
                                    <span class="float-left mr-3">{{ $post->liked_users_count }}</span>
                                    @else
                                    class="far fa-thumbs-up"></i> @endif
                                            </button>
                                </form>
                            @endauth
                            @guest
                                <button type="submit" class="btn btn-default btn-sm float-right">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span class="float-left mr-3">{{ $post->liked_users_count }}</span>
                                </button>
                            @endguest
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
            <div class="row">
                <div class="m-auto">
                    {{ $posts->links() }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach ($randomPosts as $randomPost)
                                <div class="col-md-6 blog-post aos-init aos-animate" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ Storage::url($randomPost->preview_image) }}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{ $randomPost->category->title }}</p>
                                    @auth
                                        <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-default btn-sm float-right"><i
                                                    @if (auth()->user()->likedPosts->contains($post->id)) class="fas fa-thumbs-up"></i>
                                    <span class="float-left mr-3">{{ $post->liked_users_count }}</span>
                                    @else
                                    class="far fa-thumbs-up"></i> @endif
                                                    </button>
                                        </form>
                                    @endauth
                                    @guest
                                        <button type="submit" class="btn btn-default btn-sm float-right">
                                            <i class="fas fa-thumbs-up"></i>
                                            <span class="float-left mr-3">{{ $post->liked_users_count }}</span>
                                        </button>
                                    @endguest
                                    <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{ $randomPost->title }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Like List</h5>
                        <ul class="post-list">
                            @foreach ($likedPosts as $post)
                                <li class="post">
                                    <a href="{{ route('post.show', $post->id) }}" class="post-permalink media">
                                        <img src="{{ Storage::url($post->preview_image) }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $post->title }}
                                            </h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
