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
                            <span id="getProductBtn" class="nav-link">
                                <i class="fab fa-product-hunt"> </i>
                                 <p>
                                     Продукты
                                 </p>
                             </span>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dish.index') }}" class="nav-link">
                            <i class="fas fa-star-half-alt"> </i>
                            <p>
                                Полуфабрикаты
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

                <section class="content">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">jsGrid</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div id="jsGrid1" class="jsgrid" style="position: relative; height: 100%; width: 100%;"><div class="jsgrid-grid-header jsgrid-header-scrollbar"><table class="jsgrid-table"><tr class="jsgrid-header-row"><th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 150px;">Name</th><th class="jsgrid-header-cell jsgrid-align-right jsgrid-header-sortable" style="width: 50px;">Age</th><th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 200px;">Address</th><th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">Country</th><th class="jsgrid-header-cell jsgrid-align-center jsgrid-header-sortable" style="width: 100px;">Is Married</th></tr><tr class="jsgrid-filter-row" style="display: none;"><td class="jsgrid-cell" style="width: 150px;"><input type="text"></td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;"><input type="number"></td><td class="jsgrid-cell" style="width: 200px;"><input type="text"></td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><select><option value="0"></option><option value="1">United States</option><option value="2">Canada</option><option value="3">United Kingdom</option><option value="4">France</option><option value="5">Brazil</option><option value="6">China</option><option value="7">Russia</option></select></td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" readonly=""></td></tr><tr class="jsgrid-insert-row" style="display: none;"><td class="jsgrid-cell" style="width: 150px;"><input type="text"></td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;"><input type="number"></td><td class="jsgrid-cell" style="width: 200px;"><input type="text"></td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><select><option value="0"></option><option value="1">United States</option><option value="2">Canada</option><option value="3">United Kingdom</option><option value="4">France</option><option value="5">Brazil</option><option value="6">China</option><option value="7">Russia</option></select></td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox"></td></tr></table></div><div class="jsgrid-grid-body" style="height: 821px;"><table class="jsgrid-table"><tbody><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Otto Clay</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">61</td><td class="jsgrid-cell" style="width: 200px;">Ap #897-1459 Quam Avenue</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">China</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Connor Johnston</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">73</td><td class="jsgrid-cell" style="width: 200px;">Ap #370-4647 Dis Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Lacey Hess</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">29</td><td class="jsgrid-cell" style="width: 200px;">Ap #365-8835 Integer St.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Timothy Henson</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">78</td><td class="jsgrid-cell" style="width: 200px;">911-5143 Luctus Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Ramona Benton</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">43</td><td class="jsgrid-cell" style="width: 200px;">Ap #614-689 Vehicula Street</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Ezra Tillman</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">51</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 738, 7583 Quisque St.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Dante Carter</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">59</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 976, 6316 Lorem, St.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Christopher Mcclure</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">58</td><td class="jsgrid-cell" style="width: 200px;">847-4303 Dictum Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Ruby Rocha</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">62</td><td class="jsgrid-cell" style="width: 200px;">5212 Sagittis Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Canada</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Imelda Hardin</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">39</td><td class="jsgrid-cell" style="width: 200px;">719-7009 Auctor Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Jonah Johns</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">28</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 939, 9310 A Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Herman Rosa</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">49</td><td class="jsgrid-cell" style="width: 200px;">718-7162 Molestie Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Arthur Gay</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">20</td><td class="jsgrid-cell" style="width: 200px;">5497 Neque Street</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Xena Wilkerson</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">63</td><td class="jsgrid-cell" style="width: 200px;">Ap #303-6974 Proin Street</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Lilah Atkins</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">33</td><td class="jsgrid-cell" style="width: 200px;">622-8602 Gravida Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Malik Shepard</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">59</td><td class="jsgrid-cell" style="width: 200px;">967-5176 Tincidunt Av.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Keely Silva</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">24</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 153, 8995 Praesent Ave</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">United States</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Hunter Pate</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">73</td><td class="jsgrid-cell" style="width: 200px;">P.O. Box 771, 7599 Ante, Road</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Russia</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-row"><td class="jsgrid-cell" style="width: 150px;">Mikayla Roach</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">55</td><td class="jsgrid-cell" style="width: 200px;">Ap #438-9886 Donec Rd.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">Brazil</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr><tr class="jsgrid-alt-row"><td class="jsgrid-cell" style="width: 150px;">Upton Joseph</td><td class="jsgrid-cell jsgrid-align-right" style="width: 50px;">48</td><td class="jsgrid-cell" style="width: 200px;">Ap #896-7592 Habitant St.</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;">France</td><td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input type="checkbox" disabled=""></td></tr></tbody></table></div><div class="jsgrid-pager-container"><div class="jsgrid-pager">Pages: <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">First</a></span> <span class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a href="javascript:void(0);">Prev</a></span> <span class="jsgrid-pager-page jsgrid-pager-current-page">1</span><span class="jsgrid-pager-page"><a href="javascript:void(0);">2</a></span><span class="jsgrid-pager-page"><a href="javascript:void(0);">3</a></span><span class="jsgrid-pager-page"><a href="javascript:void(0);">4</a></span><span class="jsgrid-pager-page"><a href="javascript:void(0);">5</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Next</a></span> <span class="jsgrid-pager-nav-button"><a href="javascript:void(0);">Last</a></span> &nbsp;&nbsp; 1 of 5 </div></div><div class="jsgrid-load-shader" style="display: none; position: absolute; inset: 0px; z-index: 1000;"></div><div class="jsgrid-load-panel" style="display: none; position: absolute; top: 50%; left: 50%; z-index: 1000;">Please, wait...</div></div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </section>

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
<script src="{{ asset("custom/js/product.api.js") }}"></script>
@yield('scripts')
</body>
</html>
