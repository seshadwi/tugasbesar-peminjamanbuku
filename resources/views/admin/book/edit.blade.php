@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="w-100">
            <h1>Pengubahan Buku</h1>
            <p class="lead">Ubah data pada buku yang anda lakukan pengubahan</p>
        </div>
        <form method="POST" enctype="multipart/form-data" action="{{ route('bookmanage.update', $book->id) }}">
            @method('PUT')
            @csrf
            <div class="w-100 d-flex">
                <div class="w-50">
                    <div class="form-group m-3">
                        <label for="exampleFormControlInput1">Judul Buku</label>
                        <input type="text" name="judul" value="{{$book->judul}}" class="form-control" placeholder="Buku">
                    </div>
                    <div class="form-group m-3">
                        <label for="exampleFormControlInput1">Penulis Buku</label>
                        <input type="text" name="penulis" value="{{$book->penulis}}" class="form-control" placeholder="Nama">
                    </div>       
                    <div class="form-group m-3">
                        <label for="exampleFormControlFile1">Gambar Buku</label>
                        <input type="file" name="image" class="form-control-file" id="image" aria-describedby="image" > 
                    </div>
                    <div class="m-3">
                        <button type="submit" class="btn btn-primary m-2">Submit</button>
                        <a href="{{ route('bookmanage.index') }}" class="btn btn-danger m-2">Kembali</a>
                    </div>
                </div>
                <div class="w-50">
                    <img src="{{ asset('storage/'.$book->gambar.'') }}" class="img-thumbnail w-50 mx-auto d-block" alt="...">
                </div>
                
            </div>
        </form>
    </div>
@endsection