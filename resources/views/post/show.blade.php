@extends('layouts.main')
@section('title', 'Пост')
@section('content')
    <main class="blog-post">
        <div class="container">
            <div class="content">
                <div class="row mt-5" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-widget">
                        <div class="card-header">
                            <div class="user-block">
                                <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Image">
                                <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                                <span class="description">Опубликованно - {{ $date->diffForHumans() }} в
                                    {{ $date->format('H:i') }}
                                </span>
                                @if ($update != $date)
                                    <span class="description">Изменено - {{ $update->diffForHumans() }} в
                                        {{ $update->format('H:i') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body ">
                            <img src="{{ Storage::url($post->main_image) }}" class="img-fluid pad mx-auto d-block"
                                alt="Photo">
                            <p>{!! $post->content !!}</p>
                            <div class="flex-direction:row align-items-center">
                                <button type="button" class="btn btn-default btn-sm float-left"><i
                                        class="fas fa-share"></i>
                                    Share</button>
                                @auth
                                    <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-default btn-sm float-left">
                                            <i @if (auth()->user()->likedPosts->contains($post->id)) class="fas fa-thumbs-up"></i>
                                                <span class="float-right ml-3">{{ $post->liked_users_count }}</span>
                                                @else
                                                class="far fa-thumbs-up"></i> @endif
                                                </button>
                                    </form>
                                @endauth
                                @guest
                                    <button type="submit" class="btn btn-default btn-sm float-left">
                                        <i class="fas fa-thumbs-up"></i>
                                        <span class="float-left mr-3">{{ $post->liked_users_count }}</span>
                                    </button>
                                @endguest
                                <span class="float-right text-muted">
                                    {{ $post->likedUsers->count() }} likes - {{ $post->comments->count() }}
                                    comments
                                </span>

                            </div>
                        </div>
                        <div class="card-footer card-comments">
                            @foreach ($post->comments as $comment)
                                <div class="card-footer ">
                                    <div class="card-comment">
                                        <img class="img-fluid img-circle img-sm"
                                            src="{{ Storage::url($post->main_image) }}" alt="Alt Text">
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
                        </div>
                        <div class="card-footer card-comment">
                            <div class="card-footer">
                                @auth
                                    <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                        @csrf
                                        <img class="img-fluid img-circle img-sm mr-2"
                                            src="{{ Storage::url($post->main_image) }}" alt="Alt Text">
                                        <div class="comment-text " data-aos=" fade-up">
                                            <div class="card-comment d-flex">
                                                <input type="text" name="message" class="form-control form-control-sm"
                                                    placeholder="Нажмите Enter, чтобы оставить комментарий">
                                                <button class="btn btn-primary ml-2" type="submit">Комментировать</button>
                                    </form>
                                @endauth
                                @guest
                                    <div class="d-flex align-items-center"><a class="nav-link"
                                            href="{{ route('login') }}">{{ __('Войдите') }}</a>{{ __('или') }}
                                        <a class="nav-link"
                                            href="{{ route('register') }}">{{ __('зарегистрируйтесь') }}
                                        </a>{{ __('чтобы оставить комментарий.') }}
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($relatedPosts->count() > 0)
                <h2 class="section-title mb-4" data-aos="fade-up">Рекомендации</h2>
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12">
                        <section class="related-posts">
                            <div class="card card-success" data-aos="fade-up">
                                <div class="card-body ">
                                    <div class="row">
                                        @foreach ($relatedPosts as $relatedPost)
                                            <div class="col-md-12 col-lg-6 col-xl-4">
                                                <div class="card mb-2 bg-gradient-dark">
                                                    <img class="card-img-top "
                                                        src="{{ Storage::url($relatedPost->main_image) }}"
                                                        alt="Dist Photo 1">
                                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                        <h5 class="card-title text-primary text-white">
                                                            {{ $relatedPost->title }}</h5>
                                                        <a href="{{ $relatedPost->id }}" class="text-white">Последнее
                                                            обновление
                                                            {{ $relatedPost->updated_at->diffForHumans() }}
                                                            назад</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            @endif
        </div>
        </div>
    </main>
@endsection
