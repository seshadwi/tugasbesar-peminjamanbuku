@extends('layouts.admin')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @endif
    <div class="d-flex w-100">
        <div class="w-50">
            <h1>Peminjaman Buku</h1>
            <p class="lead">Daftar peminjaman buku yang masih anda pinjam</p>
        </div>
    </div>

    <div>
        <table class="table w-100" id="dataTables">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Buku dipinjam</th>
                    <th scope="col">Tanggal pinjam</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booklogs as $item)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$item->user[0]->username}}</td>
                    <td>{{$item->book[0]->judul}}</td>
                    <td>{{$item->tanggal_ambil}}</td>
                    <td>{{$item->status=="pinjam" ? "Masih Dipinjamkan" : "Sudah Dikembalikan"}}</td>
                    <td>
                        <div class="dropdown dropleft open">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionID" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                        Action
                                    </button>
                            <div class="dropdown-menu" aria-labelledby="actionID">
                                <a class="dropdown-item" href="{{ route('logsmanage.show', $item->id) }}">Lihat</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
</div>
@endsection