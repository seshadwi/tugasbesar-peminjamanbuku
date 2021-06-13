@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="w-100">
            <h1>Detail Buku</h1>
            <p class="lead">Data detail buku</p>
        </div>
        <div class="container d-flex w-100">
            <div class="w-50">
                <img src="{{ asset('storage/'.$booklogs->book[0]->gambar.'') }}" class="img-thumbnail w-50 mx-auto d-block" alt="...">
                {{ Form::open(['url' => route('logsmanage.destroy', $booklogs->id)]) }}
                {{ Form::hidden('_method', 'DELETE') }}
                <div class="btn-group btn-block p-4 btn-group-toggle" data-toggle="buttons">
                    @if ($booklogs->status == 'pinjam')
                        <a href="{{ route('logsmanage.edit', $booklogs->id) }}" class="btn btn-primary">Kembalikan</a>    
                        <button class="btn btn-secondary disabled">Hapus</button>    
                    @else
                    <button class="btn btn-secondary disabled">Sudah dikembalikan</button>    
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    @endif
                </div>
                {{ Form::close() }}
                <p class="text-danger">Kembalikan buku terlebih dahulu untuk bisa menghapus data peminjaman</p>
            </div>          
            <div class="w-50">
                <div class="row">
                    <div class="col">
                        <div>
                            <h3>Judul Buku</h3>
                            <p class="lead">{{$booklogs->book[0]->judul}}</p>
                        </div>
                        <div>
                            <h3>Penulis Buku</h3>
                            <p class="lead">{{$booklogs->book[0]->penulis}}</p>
                        </div>
                        <div>
                            <h3>Dipinjam Oleh</h3>
                            <p class="lead">{{$booklogs->user[0]->username}}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <h3>Dipinjam Pada</h3>
                            <p class="lead">{{date("d M Y", strtotime($booklogs->tanggal_ambil))}}</p>
                        </div>
                        <div>
                            <h3>Dikembalikan Pada</h3>
                            <p class="lead">{{$booklogs->tanggal_kembali?date("d M Y", strtotime($booklogs->tanggal_ambil)):"belum dikembalikan"}}</p>
                        </div>
                        <div>
                            <h3>Status Buku</h3>
                            <p class="lead">{{$booklogs->status == "Pinjam"?"Masih Dipinjamkan":"belum dikembalikan"}}</p>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
@endsection