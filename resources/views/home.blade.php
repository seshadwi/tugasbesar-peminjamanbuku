@extends('layouts.user')

@section('content')
    <div class="container p-3 d-flex">
        <div class="w-50">
            <h1>Selamat Datang, {{__(Auth::user()->username)}}</h1>
            <p class="lead">Anda Sudah berhasil login, selamat menggunakan fitur fitur yang tersedia dalam website Perpustakaan</p>
            <hr>
            <div class="w-50 p-3 rounded" style="background-color: #cee5d0 !important;">
                <h2>Lihat Daftar Buku</h2>
                <p>Lihat daftar buku yang dapat di pinjam</p>
                <a role="button" href="{{ route('book.index') }}" class="btn btn-outline-dark">Lihat</a>
            </div>
        </div>
        <div class="w-50">
            <img class="w-100 img-fluid" src="{{ asset('images/bg-home.png') }}" alt="" srcset="">
        </div>
    </div>
@endsection