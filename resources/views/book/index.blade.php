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
                <h1>Buku</h1>
                <p class="lead">Daftar buku pada perpustakaan</p>
            </div>
            <div class="w-50 h-25 d-flex justify-content-end">
                <a href="{{ route('book.create') }}" class="btn btn-primary">Tambah Buku</a>
                <form class="form-inline">
                    <input class="form-control mr-sm-2 mx-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
            </div>
        </div>
        <div class="container">
            <div class="d-flex bd-highlight flex-wrap">
                @foreach ($book as $item)
                <div class="card m-2" style="width: 18%;">
                    <img src="{{ asset('storage/'.$item->gambar.'') }}" class="card-img-top img-thumbnail w-50 mx-auto d-block" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{__($item->judul)}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{__($item->penulis)}}</h6>
                        <div class="">
                            <a href="http://" class="btn btn-primary btn-sm m-1">Pinjam</a>
                            <div class="dropdown m-1">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Opsi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('book.show', $item->id) }}">Lihat buku</a>
                                    <a class="dropdown-item" href="{{ route('book.edit', $item->id) }}">Edit data buku</a>
                                    <a class="dropdown-item" href="{{ route('book.destroy', $item->id) }}">Delete buku</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection