@extends('layouts.admin')

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
                <div>
                    <h3>Stok Buku</h3>
                    <p class="lead">{{$book->stock}}</p>
                </div>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    {{ Form::open(['url' => route('bookmanage.destroy', $book->id), 'class' => 'd-flex']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    <a href="{{ route('bookmanage.index') }}" class="btn btn-secondary m-1">Back</a>
                    <a href="{{ route('bookmanage.edit', $book->id) }}" class="btn btn-primary m-1">Edit</a>
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger m-1')) }}
                    {{ Form::close() }}
                
                    
                  </div>
            </div>
        </div>
    </div>
@endsection