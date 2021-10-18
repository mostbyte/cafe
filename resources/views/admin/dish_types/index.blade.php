@extends('layouts.adminApp')

@section('content-title')
Типы блюд
<a href="{{route('admin.dishtype.create')}}" style="color: #00cd5a;" class="btn btn-app-success">
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
                        @foreach($dishTypes as $dishType)
                            <tr>
                                <td>{{ $dishType->id }}</td>
                                <td>{{ $dishType->name }}</td>
                                <td>{{ $dishType->created_at }}</td>
                                <td>
                                    <a href="{{route('admin.dishtype.edit', $dishType->id)}}" class="btn btn-app">
                                        <i class="fas fa-edit"></i> Изменить
                                    </a>
                                    <a href="javascript:" onclick="document.querySelector('#category-{{$dishType->id}}').submit()" class="btn btn-app">
                                        <i class="fas fa-trash-alt"></i> Удалить
                                    </a>
                                    <form action="{{route('admin.dishtype.delete', $dishType->id)}}" id="category-{{$dishType->id}}" method="post">
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
