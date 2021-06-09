@extends('layouts.index')

@section('content')

<div class="bg-full-home h-100 p-5">    
    <div class="container bg-light h-100 p-3 rounded">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand font-weight-bold" href="#">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav mr-auto d-flex w-100 justify-content-end">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <div class="container d-flex">
            <div class="w-50">
                <h1>Selamat Datang</h1>
                <h2>Di Web Management Perpustakaan</h2>
                <hr>
                <p class="lead">
                    Web Management Perpustakaan bertujuan untuk memudahkan pengguna dalam melakukan peminjaman buku yang ada di Perpustakaan. dengan mendaftar sebagai 
                    pengguna untuk melakukan peminjaman buku. dan anda sudah dapat membawa pulang buku yang anda pinjam dan melakukan pengembalian buku sesuai dengan tanggal pengembalian buku
                </p>
            </div>
            <div class="w-50">
                <img class="w-75 img-fluid" src="{{ asset('images/bg-home.png') }}" alt="" srcset="">
            </div>
        </div>
    </div>
</div>

@endsection