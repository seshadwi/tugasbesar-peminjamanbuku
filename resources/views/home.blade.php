@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Home</h1>
    <p class="lead">Data buku dan peminjaman</p>

    <div class="d-flex">
        <div class="w-25 bg-primary text-white p-2 m-2 rounded-lg">
            <h4>Jumlah buku : <span class="badge badge-light">4</span></h4>
            <a href="#" class="btn btn-success">Lihat buku</a>
        </div>
        <div class="w-25 bg-success text-white p-2 m-2 rounded-lg">
            <h4>Jumlah buku dipinjam : <span class="badge badge-light">4</span></h4>
            <a href="#" class="btn btn-primary">Lihat peminjaman</a>
        </div>
    </div>
</div>
@endsection
