@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="w-100">
        <h1>Tambah Buku</h1>
        <p class="lead">Tambahkan buku baru</p>
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{ route('bookmanage.store') }}">
        @csrf
        <div class="form-group w-50 m-3">
            <label for="exampleFormControlInput1">Judul Buku</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul Buku">
            @error('judul')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group w-50 m-3">
            <label for="exampleFormControlInput1">Penulis Buku</label>
            <input type="text" name="penulis" class="form-control" placeholder="Nama penulis">
            @error('penulis')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group w-50 m-3">
            <label for="exampleFormControlInput1">Stok Buku</label>
            <input type="number" name="stok" class="form-control" value="1">
            @error('stok')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group m-3">
            <label for="exampleFormControlFile1">Gambar Buku</label>
            <input type="file" name="image" class="form-control-file" id="image" aria-describedby="image">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="m-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('bookmanage.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection