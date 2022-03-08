@extends('layouts.adminApp')

@section('content-title')
    Создать тип блюда
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Создать</h3>
        </div>
        <form name="productCreateForm" id="productCreateForm">
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
                    <label for="Name">Название</label>
                    <input name="Name" type="text" class="form-control" id="Name">
                </div>
                <div class="form-group">
                    <label for="Category">Категория</label>
                    <input name="CategoryId" type="text" class="form-control" id="Category">
                </div>
                <div class="form-group">
                    <label for="Measure">Ед. измирения</label>
                    <input name="MeasurementId" type="text" class="form-control" id="Measure">
                </div>
                <div class="form-group">
                    <label for="Price">Цена</label>
                    <input name="Price" type="text" class="form-control" id="Price">
                </div>
                <div class="form-group">
                    <label for="Description">Описание</label>
                    <input name="Description" type="text" class="form-control" id="Description">
                </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="productStoreBtn">Создать</button>
            </div>
        </form>
    </div>
@endsection
