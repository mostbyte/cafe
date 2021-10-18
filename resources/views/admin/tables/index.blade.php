@extends('layouts.adminApp')

@section('content-title')
Столы
<a href="{{route('admin.table.create')}}" style="color: #00cd5a;" class="btn btn-app-success">
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
                            <th>Добавлено</th>
                            <th>Дейсвие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tables as $table)
                            <tr>
                                <td>{{ $table->id }}</td>
                                <td>{{ $table->name }}</td>
                                <td>{{ $table->created_at }}</td>
                                <td>
                                    <a href="{{route('admin.table.edit', $table->id)}}" class="btn btn-app">
                                        <i class="fas fa-edit"></i> Изменить
                                    </a>
                                    <a href="javascript:" onclick="document.querySelector('#category-{{$table->id}}').submit()" class="btn btn-app">
                                        <i class="fas fa-trash-alt"></i> Удалить
                                    </a>
                                    <form action="{{route('admin.table.delete', $table->id)}}" id="category-{{$table->id}}" method="post">
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
