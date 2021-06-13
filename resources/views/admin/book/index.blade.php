@extends('layouts.admin')

@section('content')
<div class="container p-2">
    <div class="d-flex w-100">
        <div>
            <h1>Buku</h1>
            <p class="lead">Daftar buku pada perpustakaan</p>
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
        </div>
        {{-- <div class="w-50 h-25 d-flex align-self-center justify-content-center">
            <form class="form-inline">
                <input class="form-control mr-sm-2 mx-2" type="search" placeholder="Cari nama buku" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div> --}}
    </div>
    <hr>
    
    <div>
        <table id="dataTables" class="table table-striped table-bordered" style="width: 100%">
            <thead >
                <tr>
                    <th>#</th>
                    <th>Judul Buku</th>
                    <th>Penulis Buku</th>
                    <th>Stok Buku</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $item)
                <tr>
                    <td scope="row">{{$loop->index +1}}</td>
                    <td>{{__($item->judul)}}</td>
                    <td>{{__($item->penulis)}}</td>
                    <td>{{__($item->stock)}}</td>
                    <td>
                        
                        {{-- <a href="{{ route('bookmanage.destroy', $item->id) }}" class="btn btn-sm btn-danger">Delete</a> --}}
                        {{ Form::open(['url' => route('bookmanage.destroy', $item->id), 'class' => 'd-flex']) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <a href="{{ route('bookmanage.show', ['bookmanage' => $item->id]) }}" class="btn btn-sm btn-secondary m-1">Show</a>
                        <a href="{{ route('bookmanage.edit', ['bookmanage' => $item->id]) }}" class="btn btn-sm btn-primary m-1">Edit</a>
                        {{ Form::submit('Delete', array('class' => 'btn btn-sm btn-danger m-1')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- @foreach ($book as $item)
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
        @endforeach --}}
    </div>
    {{-- <div class="d-flex justify-content-center p-3">
        {{ $book->links() }}
    </div> --}}
    <hr>
    
</div>

@endsection