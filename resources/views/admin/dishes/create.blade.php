@extends('layouts.adminApp')

@section('content-title')
    Создать блюдо
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Создать</h3>
        </div>
        <form action="{{route('admin.dish.store')}}" method="POST">
            @csrf
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
                    <input name="name" type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="count">Число</label>
                    <input name="count" type="number" class="form-control" id="count">
                </div>
                <div class="form-group">
                    <label for="department_id">ID склада</label>
                    <input name="department_id" type="number" class="form-control" id="department_id">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>
@endsection

