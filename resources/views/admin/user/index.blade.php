@extends('admin/layouts.main')
@section('title', 'Пользователи')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                            <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary">Добавить</a>
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
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td class="text-center"><a href="{{ route('admin.user.show', $user->id) }}">
                                                <i class="far fa-eye"></i></a></td>
                                        <td class="text-center"><a href="{{ route('admin.user.edit', $user->id) }}"><i
                                                    class="fas fa-pen"></i></a></td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
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
