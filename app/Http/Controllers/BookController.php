<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $book = Book::orderBy('judul', 'asc')->paginate(20);
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
            'gambar' => 'required'
        ]);
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images/book', 'public');
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
        return redirect()->route('mahasiswa.index')->with('success', 'Berhasil menghapus data buku');
    }
}
