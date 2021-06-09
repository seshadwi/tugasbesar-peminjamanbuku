<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-full-home rounded-bottom m-0">
        <a class="navbar-brand color-white font-weight-bold" href="{{ route('home') }}">
            <h4 class="m-0">Perpustakaan</h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto d-flex w-100 justify-content-end">
                <li class="nav-item active">
                    <div class="nav-link">
                        <a href="{{ route('home') }}" class="btn {{ Request::is('home') ? 'text-white' : 'text-white-non' }}">Home</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link">
                        <a href="{{ route('book.index') }}" class="btn {{ Request::is('buku') ? 'text-white' : 'text-white-non' }}">Buku</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link">
                        <a href="{{ route('booklogs.index') }}" class="btn {{ Request::is('peminjaman') ? 'text-white' : 'text-white-non' }}">Peminjaman</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link dropdown">
                        <a class="btn dropdown-toggle text-white m-0" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__(Auth::user()->username)}}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
                
            </ul>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>