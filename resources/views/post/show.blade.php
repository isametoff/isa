@extends('layouts.main')
@section('title', 'Пост')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{ $date->translatedFormat('F') }}
                {{ $date->day }} • {{ $date->year }} • {{ $date->format('H:i') }} • комментариев
                {{ $post->comments->count() }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ Storage::url($post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{!! $post->content !!}</p>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @foreach ($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ Storage::url($relatedPost->main_image) }}" alt="related post"
                                        class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('post.show', $relatedPost->id) }}">
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                        <div class="col-md-12" data-aos="fade-up">
                            <div class="card card-widget " data-aos="fade-up">
                                @foreach ($post->comments as $comment)
                                    <div class="card-footer card-comments" data-aos="fade-up">
                                        <div class="card-comment ">
                                            <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg"
                                                alt="User Image">
                                            <div class="comment-text " data-aos=" fade-up">
                                                <span class="username">{{ $comment->user->name }}</span>
                                                <span
                                                    class="text-muted float-right">{{ $comment->DateAsCarbon->diffForHumans() }}</span>
                                                </span>
                                                {{ $comment->message }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="card-footer">
                                    @auth
                                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                            @csrf
                                            <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg"
                                                alt="Alt Text">
                                            <div class="img-push " data-aos="fade-up">
                                                <textarea type="text" name="message" id="comment" class="form-control" placeholder="Напишите комментарий" rows="10"></textarea>
                                            </div>
                                            <input type="submit" value="Добавить" data-aos="fade-up"
                                                class=" btn float-right mt-3 btn-primary">
                                        </form>
                                    @endauth
                                    @guest
                                        <div class="d-flex align-items-center"><a class="nav-link"
                                                href="{{ route('login') }}">{{ __('Войдите') }}</a>{{ __('или') }}
                                            <a class="nav-link"
                                                href="{{ route('register') }}">{{ __('зарегистрируйтесь') }}</a>{{ __('чтобы оставить комментарий.') }}
                                        </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
