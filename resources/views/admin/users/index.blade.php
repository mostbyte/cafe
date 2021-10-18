@extends('layouts.adminApp')

@section('content-title')
Пользователи
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
                            <th>Имя</th>
                            <th>Логин</th>
                            <th>Роль</th>
                            <th>Процент от чека</th>
                            <th>Дейсвие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->login }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    @if ($user->check_percent == 1)
                                        Есть
                                    @endif
                                    @if ($user->check_percent == 0)
                                        Нет
                                    @endif
                                </td>
                                <td><a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-block btn-primary">Изменить</a></td>
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
