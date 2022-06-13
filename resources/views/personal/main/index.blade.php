@extends('personal/layouts.main')
@section('title', 'Личный кабинет')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Личный кабинет</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $data['likedCount'] }}</h3>
                                <p>Понравившиеся посты</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-heart"></i>
                            </div>
                            <a href="{{ route('personal.liked.index') }}" class="small-box-footer">Подробнее <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $data['commentCount'] }}<sup style="font-size: 20px"></sup></h3>
                                <p>Комментарии</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon far fa-comment"></i>
                            </div>
                            <a href="{{ route('personal.comment.index') }}" class="small-box-footer">Подробнее <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
