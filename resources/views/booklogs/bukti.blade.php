<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Peminjaman Buku</title>
</head>
<body>
    <div style="padding: 1rem">
        <div style="text-align: center" >
            <h1>Perpustakaan</h1>
            <hr width="50%">
        </div>
        <h3>Id Peminjaman : {{$books->id}}</h3>
        <h3>Nama Peminjam : {{$books->user[0]->username}}</h3>
        <div style="display: flex; width: 100%;">
            <div style="width: 50%; padding: 1rem;">
                <h1>Data Buku</h1>
                <hr>
                <h4>Nama Buku : {{$books->book[0]->judul}}</h4>
                <h4>Nama Penulis : {{$books->book[0]->penulis}}</h4>
                <h4>jumlah buku : {{$books->jumlah}}</h4>
                <h4>Tanggal Peminjaman : {{date("d F Y", strtotime($books->tanggal_ambil))}} </h4>
                <div style="border: 0.1rem solid red;padding: 1rem">
                    <h4>Tanggal Pengembalian</h4>
                    <h4>{{date("d F Y", strtotime($books->tanggal_ambil . "+1 week"))}}</h4>
                    <hr>
                    <p style="color: red;">Harap dikembalikan pada waktu yang sudah di tentukan</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>