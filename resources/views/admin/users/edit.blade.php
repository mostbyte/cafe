@extends('layouts.adminApp')

@section('content-title')
    User {{$user->id}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Логин</th>
                            <th>Роль</th>
                            <th>Процент от чека</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->login}}</td>
                            <form action="{{route('admin.user.update', $user->id)}}" method="post">@csrf @method('PUT') @method('PATCH')
                                <td class="w-25">
                                        <select name="role" id="" class="form-control">
                                            <option value="" disabled>Выберите роль</option>
                                            @foreach($roles as $key => $role)
                                                <option value="{{$key}}" {{$key !== $user->role ? '' : 'selected'}}>{{$role}}</option>
                                            @endforeach
                                        </select>
                                </td>
                                <td>
                                    <select name="check_percent" id="" class="form-control">
                                            @if ($user->check_percent == 1)
                                                <option selected value="{{ $user->check_percent }}">Есть</option>
                                                <option value="0">Нет</option>
                                            @endif
                                            @if ($user->check_percent == 0)
                                                <option selected value="{{ $user->check_percent }}">Нет</option>
                                                <option value="1">Есть</option>
                                            @endif
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-block btn-primary">Save</button>
                                </td>
                            </form>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
