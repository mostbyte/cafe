@extends('layouts.adminApp')

@section('content-title')
    Изменить стол
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Изменить</h3>
        </div>
        <form action="{{route('admin.table.update', $table->id)}}" method="POST">
            @csrf
            @method('PUT')
            @if ($errors->any())
            <div class="alert alert-danger" style="margin: 0; padding:0;">
                <ul style="margin: 0; padding:0; margin-right:15px;">
                    <li>Что-то пошло не так :(</li>
                </ul>
            </div>
        @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Название</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ $table->name }}">
                </div>
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input name="price" type="number" class="form-control" id="price" value="{{ $table->price }}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
@endsection

