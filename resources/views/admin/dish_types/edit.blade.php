@extends('layouts.adminApp')

@section('content-title')
    Изменить тип блюда
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Изменить</h3>
        </div>
        <form action="{{route('admin.dishtype.update', $dishType->id)}}" method="POST">
            @csrf
            @method('PUT')
            @method('PATCH')
            @if ($errors->any())
            <div class="alert alert-danger" style="margin: 0; padding:0;">
                <ul style="margin: 0; padding:0;">
                    <li>Что-то пошло не так :(</li>
                </ul>
            </div>
        @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Название</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ $dishType->name }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
@endsection

