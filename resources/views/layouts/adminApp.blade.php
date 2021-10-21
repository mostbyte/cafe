<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ | Панель</title>
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/daterangepicker/daterangepicker.css")}}">
    @yield('links')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" >
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a  class="nav-link"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Выйти') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('admin.index') }}" class="brand-link">
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Админ панель</span>
        </a>
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
                </div>
            </div>
            @if(Auth::user() && in_array(Auth::user()->role, ['admin', 'moderator']))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.dish.index') }}" class="nav-link">
                            <i class="fas fa-hamburger"> </i>
                            <p>
                                 Блюда
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dishtype.index') }}" class="nav-link">
                            <i class="fas fa-receipt"> </i>
                            <p>
                                 Типы блюд
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.table.index') }}" class="nav-link">
                            <i class="fas fa-border-all"> </i>
                            <p>
                                 Столы
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        @if(Auth::user() && Auth::user()->role == 'admin')
                            <a href="{{ route('admin.user.index') }}" class="nav-link">
                                <i class="fas fa-user-shield"></i>
                                <p>
                                    Пользователи
                                </p>
                            </a>
                        @endif
                    </li>
                </ul>
            </nav>
            @endif
        </div>
    </aside>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('content-title')</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <footer class="main-footer" style="margin-bottom: -25px">
        <b>MostByte Cafe</b> All rights reserved.
    </footer>
</div>


<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("plugins/daterangepicker/daterangepicker.js")}}"></script>
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<script src="{{asset("dist/js/adminlte.js")}}"></script>>
@yield('scripts')
</body>
</html>
