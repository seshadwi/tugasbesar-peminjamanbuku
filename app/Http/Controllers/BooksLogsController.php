<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Facades\App;

class BooksLogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booklogs = BookLogs::where(['id_peminjam' => Auth::user()->id, 'status' => 'pinjam'])->with('book', 'user')->paginate(10);
        return view('booklogs/index', compact('booklogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function kembalikan($id)
    {
        $data = BookLogs::where("id", $id)->first();
        $data->update([
            'status' => 'kembali',
            'tanggal_kembali' => Date('Y-m-d')
        ]);
        return redirect()->route('booklogs.index')->with('success', 'Berhasil mengembalikan buku');
    }
    public function cetak_bukti($id)
    {
        $data['books'] = BookLogs::where('id', $id)->with('book', 'user')->first();
        $data['title'] = "Bukti Peminjaman Buku";
        $view = view('booklogs/bukti', $data);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
        // $pdf = PDF::loadview('booklogs/bukti', ["books" => $data['books'], 'title' => $data['title']]);
        // $filename = date("d-F-Y-pinjaman-" . $data['books']->user[0]->username . "");
        // return $pdf->download($filename);
    }
}
