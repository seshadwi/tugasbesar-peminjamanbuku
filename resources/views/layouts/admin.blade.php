<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin Perpustakaan</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Menu Admin</p>
                <li class="{!! Request::is('admin/bookmanage') || Request::is('admin/bookmanage/*') ? "active" : "non" !!}">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Buku</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{ route('bookmanage.index') }}">Kelola Buku</a>
                        </li>
                        <li>
                            <a href="{{ route('bookmanage.create') }}">Tambah Buku</a>
                        </li>
                    </ul>
                </li>
                <li class="{!! Request::is('admin/bookmanage') || Request::is('admin/bookmanage/*') ? "active" : "non" !!}">
                    <a href="#peminjamanSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Peminjaman</a>
                    <ul class="collapse list-unstyled" id="peminjamanSubmenu">
                        <li>
                            <a href="{{ route('logsmanage.index') }}">Kelola peminjaman</a>
                        </li>
                    </ul>
                </li>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i>
                            <img src="{{ asset('images/home-icon.png') }}" style="width: 1rem;" alt="" srcset="">
                        </i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-outline-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i>
                            <img src="{{ asset('images/home-icon.png') }}" style="width: 1rem;" alt="" srcset="">
                        </i>
                        <span>{{auth()->guard('admin')->user()->username}}</span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a role="text" class="nav-link">{{auth()->guard('admin')->user()->username}}</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>