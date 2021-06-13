@extends('layouts.user')

@section('content')
<div class="container p-4">
    <div class="d-flex w-100">
        <div class="w-50">
            <h1>Buku</h1>
            <p class="lead">Daftar buku pada perpustakaan</p>
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
        <div class="w-50 h-25 d-flex align-self-center justify-content-center">
            <form class="form-inline">
                <input class="form-control mr-sm-2 mx-2" type="search" placeholder="Cari nama buku" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center align-content-end bd-highlight flex-wrap">
            @foreach ($book as $item)
            <div class="card m-2" style="width: 20%;">
                <img src="{{ asset('storage/'.$item->gambar.'') }}"
                    class="card-img-top book-image img-thumbnail p-2 mx-auto d-block" alt="...">
                <div class="card-body d-flex flex-column align-items-center ">
                    <h5 class="card-title">{{__($item->judul)}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{__($item->penulis)}}</h6>
                    <div class="">
                        <a href="{{ route('book.pinjam', $item->id) }}" class="btn btn-primary btn-sm m-1">Pinjam</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center p-3">
            {{ $book->links() }}
        </div>
        <hr>
    </div>
</div>

@endsection