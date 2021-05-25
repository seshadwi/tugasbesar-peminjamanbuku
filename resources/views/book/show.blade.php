@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="w-100">
            <h1>Detail Buku</h1>
            <p class="lead">Data detail buku</p>
        </div>
        <div class="container d-flex w-100">
            <div class="w-50">
                <img src="{{ asset('storage/'.$book->gambar.'') }}" class="img-thumbnail w-50 mx-auto d-block" alt="...">
            </div>          
            <div class="w-50">
                <div>
                    <h3>Judul Buku</h3>
                    <p class="lead">{{$book->judul}}</p>
                </div>
                <div>
                    <h3>Penulis Buku</h3>
                    <p class="lead">{{$book->penulis}}</p>
                </div>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('book.destroy', $book->id) }}" class="btn btn-danger">Delete</a>
                  </div>
            </div>
        </div>
    </div>
@endsection