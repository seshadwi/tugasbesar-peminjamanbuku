<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    public function __construct()
    {
        // agar jika membuka halaman ini, jika belum login maka akan melakukan login terlebih dahulu
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::orderBy('judul', 'asc')->paginate(10);
        return view('book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'image' => 'required'
        ]);
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images/book', 'public');
        } else {
            $image_name = asset('images/default.jpg');
        }
        Book::create([
            'judul' => $request->get('judul'),
            'penulis' => $request->get('penulis'),
            'gambar' => $image_name
        ]);
        return redirect()->route('book.index')->with('success', 'berhasil menambahkan buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('id', $id)->first();
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        return view('book.edit', compact('book'));
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
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
        ]);

        $book = Book::where('id', $id)->first();
        $book->judul = $request->get('judul');
        $book->penulis = $request->get('penulis');
        if ($book->gambar && file_exists(storage_path('images/book/' . $book->gambar))) {
            Storage::delete('public/' . $book->gambar);
        }
        if ($request->file('image')) {
            $book->gambar = $request->file('image')->store('images', 'public');
        }
        $book->save();

        return redirect()->route('book.show', $id)->with('success', 'Berhasil mengubah data buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id', $id)->delete();
        return redirect()->route('book.index')->with('success', 'Berhasil menghapus data buku');
    }

    public function pinjam($id)
    {
        $book = Book::where('id', $id)->get();
        return view("book/pinjam", compact("book"));
    }
    public function storepinjam(Request $request)
    {
        $request->validate([
            'tanggalpeminjaman' => 'required',
            'stok' => 'required'
        ]);
        $data = Book::where('id', $request->get('idbuku'))->first();
        $data->update([
            'stock' => $data->stock - $request->get('stok')
        ]);
        if ($request->get('stok') >= $data->stock || $request->get('stok') <= 0) {
            return redirect()->route('book.pinjam', $data->id)->with('error', 'Tidak bisa meminjam buku karena jumlah buku melebihi stok buku');
        }
        BookLogs::create([
            'id_peminjam' => $request->get('idpeminjam'),
            'id_buku' => $request->get('idbuku'),
            'status' => 'pinjam',
            'jumlah' => $request->get('stok'),
            'tanggal_ambil' => $request->get('tanggalpeminjaman')
        ]);
        return redirect()->route('booklogs.index')->with('success', 'Berhasil meminjam buku');
    }
    public function home()
    {
        $data['book'] = Count(Book::all());
        $data['book_logs'] = Count(BookLogs::where('id_peminjam', Auth::user()->id)->get());
        return view('home', $data);
    }
}
