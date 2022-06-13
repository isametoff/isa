@extends('personal/layouts.main')
@section('title', 'Редактирование комментария')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование комментария</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Комментарии</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $comment->message }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-50">
                                <textarea id="summernote" name="message">{{ $comment->message }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="submit" class="btn btn-primary" value="Редактировать">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
