<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLogs;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booklogs = BookLogs::all();
        return view('admin.peminjaman.index', compact('booklogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        redirect('logsmanage.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        redirect('logsmanage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booklogs = BookLogs::where(['id' => $id])->with('user', 'book')->first();
        return view('admin.peminjaman.show', compact('booklogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BookLogs::where("id", $id)->first();
        $book = Book::where('id', $data->id_buku)->first();
        $book->update([
            'stock' => $data->jumlah + $book->stock
        ]);
        $data->update([
            'status' => 'kembali',
            'tanggal_kembali' => Date('Y-m-d')
        ]);
        return redirect()->route('logsmanage.index')->with('success', 'Berhasil mengembalikan buku');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BookLogs::where('id', $id)->delete();
        return redirect()->route('logsmanage.index')->with('success', 'Berhasil menghapus data peminjaman');
    }
}
