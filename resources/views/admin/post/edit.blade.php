@extends('admin/layouts.main')
@section('title', 'Редактирование поста')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $post->title }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название поста"
                                    value="{{ $post->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Редактировать превью</label>
                                <div class="w-50 mb-3">
                                    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image"
                                        class="w-25">
                                </div>
                                <div class="input-group w-25">
                                    <div class="custom-file">
                                        <label class="custom-file-label">Изменить изображение</label>
                                        <input type="file" class="custom-file-input" name="preview_image">
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Редактировать главное изображение</label>
                                <div class="w-50 mb-3">
                                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image"
                                        class="w-25">
                                </div>
                                <div class="input-group w-25">
                                    <div class="custom-file">
                                        <label class="custom-file-label">Изменить изображение</label>
                                        <input type="file" value="{{ $post->main_image }}" class="custom-file-input"
                                            name="main_image">
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('main_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <label>Категории</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                            {{ $category->title }} </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <label>Тэги</label>
                                <div class="select2-purple">
                                    <select name="tags_ids[]" class="select2 select2-hidden-accessible" multiple=""
                                        data-placeholder="Выберете тэги" data-dropdown-css-class="select2-purple"
                                        style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                        @foreach ($tags as $tag)
                                            <option
                                                {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                                value="{{ $tag->id }}">
                                                {{ $tag->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tags_ids')
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
