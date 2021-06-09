@extends('layouts.user')

@section('content')
<div class="container p-3">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <div class="d-flex w-100">
        <div class="w-50">
            <h1>Peminjaman Buku</h1>
            <p class="lead">Daftar peminjaman buku yang masih anda pinjam</p>
        </div>
    </div>
    <hr>
    <div>
        <div class="d-flex justify-content-center align-items-center align-content-end bd-highlight flex-wrap">
            @foreach ($booklogs as $item)
            
            <div class="card m-2" style="width: 25%;">
                <div class="card-body d-flex flex-column align-items-center ">
                    <img src="{{ asset('storage/'.$item->book[0]->gambar.'') }}"
                    class="card-img-top book-image img-thumbnail  mx-auto d-block" style="height: 10rem;" alt="...">
                    <div class="p-2 text-center">
                        <h5 class="card-title">{{__($item->book[0]->judul)}}</h5>
                        <div class="card-subtitle mb-2 text-muted">
                            <p class="m-0">{{__($item->book[0]->penulis)}}</p>
                            <p class="m-0">Tgl Pinjam: {{date("d F Y", strtotime($item->tanggal_ambil))}}</p>
                            <div class="alert alert-danger" role="alert">
                                Batas Pengembalian : {{date("d F Y", strtotime($item->tanggal_ambil . "+1 week"))}}
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('booklogs.cetak', ['id'=>$item->id]) }}" class="btn btn-sm btn-outline-primary">Cetak Bukti</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center p-3">
        {{ $booklogs->links() }}
    </div>
    <hr>
</div>
</div>
@endsection