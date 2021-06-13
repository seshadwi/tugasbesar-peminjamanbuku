@extends('layouts.user')

@section('content')
<div class="container p-4">
    <div class="w-100">
        <h1>Pinjam Buku</h1>
        <p class="lead">Halaman peminjaman buku</p>
        <hr>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        {{$message}}
    </div>
    @endif
    <div class="d-flex">
        <div class="card" style="width: 30%;">
            <img class="card-img-top book-image p-4" style="height: 15rem;" src="{{ asset('storage/'.$book[0]->gambar.'') }}" alt="">
            <div class="card-body">
                <h4 class="card-title">Data Buku</h4>
                <div class="card-text">
                    <p class="m-0"><strong>Judul</strong> : {{$book[0]->judul}}</p>
                    <p class="m-0"><strong>Penulis</strong> : {{$book[0]->penulis}}</p>
                </div>
            </div>
        </div>
        <div class="m-4 w-50">
            <h1>Form Peminjaman</h1>
            <form action="{{ route('book.storepinjam') }}" method="post" class="m-3">

                @csrf
                <div class="form-group">
                    <label for="namaPeminjam">Nama Peminjam</label>
                    <input type="text" disabled class="form-control" value="{{Auth::user()->username}}"
                        name="namapeminjam" id="namaPeminjam" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Nama peminjam dari pengguna</small>
                </div>
                <div class="form-group">
                  <label for="stok">Jumlah Buku</label>
                  <input type="number"
                    class="form-control" name="stok" id="stok" value="1" max="{{$book[0]->stock}}" aria-describedby="stokid" required>
                  <small id="stokid" class="form-text text-muted">Jumlah stock buku masih <span class="badge badge-success">{{$book[0]->stock}}</span></small>
                </div>
                <div class="form-group">
                    <label for="tanggalpeminjaman">Tanggal peminjaman</label>
                    <input type="date" class="form-control" name="tanggalpeminjaman" id="tanggalpeminjaman"
                        aria-describedby="tanggalpeminjaman" required placeholder="">
                    <small id="tanggalpeminjaman" class="form-text text-muted">Masukkan tanggal peminjaman</small>
                    @error('tanggalpeminjaman')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                {!! Form::hidden('idpeminjam', Auth::user()->id) !!}
                {!! Form::hidden('idbuku', $book[0]->id) !!}

                <div>
                    <button type="submit" class="btn btn-primary m-2">Submit</button>
                    <a href="{{ route('book.index') }}" class="btn btn-danger m-2">Kembali</a>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection