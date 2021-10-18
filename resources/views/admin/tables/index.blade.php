@extends('layouts.adminApp')

@section('content-title')
Столы
@endsection

@section('content')
<div id="grid">
    <div id="tbl">
    </div>
</div>
<button type="button" class="btn btn-block btn-primary">Добавить</button>
<br>
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('resizable\jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('style.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('jquery-ui-1.12.1.custom\jquery-ui.min.js') }}"></script>
<script src="{{ asset('resizable\jquery-ui.min.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>
@endsection
