@extends('layouts/app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <div class="d-flex w-100">
        <div class="w-50">
            <h1>Peminjaman Buku</h1>
            <p class="lead">Daftar peminjaman buku</p>
        </div>
        <div class="w-50 h-25 d-flex justify-content-end">

        </div>
    </div>
    <div class="container">
        <div class="d-flex bd-highlight flex-wrap">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Buku dipinjam</th>
                        <th scope="col">Tanggal pinjam</th>
                        <th scope="col">Tanggal kembali</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
@endsection