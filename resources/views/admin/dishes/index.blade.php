@extends('layouts.adminApp')

@section('content-title')
    Блюда
    <a href="{{route('admin.dish.create')}}" style="color: #00cd5a;" class="btn btn-app-success">
        <i class="far fa-plus-square"></i> Создать
    </a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-0" style="height: auto;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Число</th>
                        <th>ID склада</th>
                        <th>Добавлено</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dishes as $dish)
                        <tr>
                            <td>{{ $dish->id }}</td>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->count }}</td>
                            <td>{{ $dish->department_id }}</td>
                            <td>{{ $dish->created_at }}</td>
                            <td>
                                <a href="{{route('admin.dish.edit', $dish->id)}}" class="btn btn-app">
                                    <i class="fas fa-edit"></i> Изменить
                                </a>
                                <a href="javascript:" onclick="document.querySelector('#category-{{$dish->id}}').submit()" class="btn btn-app">
                                    <i class="fas fa-trash-alt"></i> Удалить
                                </a>
                                <form action="{{route('admin.dish.delete', $dish->id)}}" id="category-{{$dish->id}}" method="post">
                                    @csrf @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
