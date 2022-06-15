@extends('admin/layouts.main')
@section('title', 'Посты')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="#">Посты</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="col-1 mb-3 ">
                            <a href="{{ route('admin.post.create') }}" class="btn btn-block btn-primary">Добавить</a>
                        </div>
                    </div>
                </div>
                <div class="card w-50">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th class="text-center colspan-3 ">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td class="text-center"><a href="{{ route('post.show', $post->id) }}" onclick="window.open(this.href);
                                            return false">
                                                <i class="far fa-eye"></i></a></td>
                                        <td class="text-center"><a href="{{ route('admin.post.edit', $post->id) }}"><i
                                                    class="fas fa-pen"></i></a></td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0">
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
