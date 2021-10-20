@extends('layouts.adminApp')

@section('content-title')
Столы
@endsection

@section('content')

<div id="grid">
    <div id="tbl">
        @foreach($tables as $table)
        @php($coordinates = json_decode($table->coordinates, true))
        @php($size = json_decode($table->size, true))
        <div    class="item {{ $table->type }}"
                id="table-{{ $loop->iteration }}"
                style="
                    left: {{$coordinates['y']}}px;
                    top: {{$coordinates['x']}}px;
                    height: {{$size['height']}}px;
                    width: {{$size['width']}}px;"
                    table-id="{{ $table->id }}">
            <span class="editable table-name" contenteditable="true">{{ $table->name }}</span>||
            <span class="editable table-price" contenteditable="true">{{ $table->price }}</span>
            <img class="close" src="https://img.icons8.com/windows/32/000000/macos-close.png"/>
            <div class="resizer"></div>
            </div>
        @endforeach
    </div>
</div>
<button style="float: left; margin-right: 10px;" type="button" class="btn add-table-btn btn-block btn-primary">Добавить</button>
<button type="button" class="btn save-table-btn btn-block btn-success">Сохранить</button>
<br>
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('resizable\jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('style.css') }}">
@endsection

@section('scripts')
<script src="{{ asset("plugins/toastr/toastr.min.js") }}"></script>
<script src="{{ asset('resizable\jquery-ui.min.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>
@endsection
