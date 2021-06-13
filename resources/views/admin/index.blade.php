@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Selamat Datang {{auth()->guard('admin')->user()->username}}</h1>
        <p class="lead">Anda dapat mengelola buku dan pengguna di halaman ini. Silahkan pilih menu berikut</p>
        <div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Jumlah Buku</h5>
                  <p class="card-text">Jumlah buku pada perpustakaan <span class="badge badge-danger">{{$book}}</span></p>
                </div>
              </div>
        </div>
    </div>
@endsection