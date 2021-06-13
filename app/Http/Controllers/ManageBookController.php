<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookLogs;
use Illuminate\Support\Facades\Storage;

class ManageBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::orderBy('judul', 'asc')->paginate(10);
        return view('admin.book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
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
            'stok' => 'required',
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
            'stock' => $request->get('stok'),
            'gambar' => $image_name
        ]);
        return redirect()->route('bookmanage.index')->with('success', 'berhasil menambahkan buku');
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
        return view('admin.book.show', compact('book'));
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
        return view('admin.book.edit', compact('book'));
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
            'stok' => 'required',
        ]);

        $book = Book::where('id', $id)->first();
        $book->judul = $request->get('judul');
        $book->penulis = $request->get('penulis');
        $book->stock = $request->get('stok');
        if ($book->gambar && file_exists(storage_path('images/book/' . $book->gambar))) {
            Storage::delete('public/' . $book->gambar);
        }
        if ($request->file('image')) {
            $book->gambar = $request->file('image')->store('images', 'public');
        }
        $book->save();

        return redirect()->route('bookmanage.show', $id)->with('success', 'Berhasil mengubah data buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checklogs = BookLogs::where('id_buku', $id)->with('book')->first();
        if ($checklogs) {
            return redirect()->route('bookmanage.index')->with('error', 'Tidak bisa menghapus buku ' . $checklogs->book[0]->judul . ', karena buku masih dipinjamkan');
        } else {
            Book::where('id', $id)->delete();
            return redirect()->route('bookmanage.index')->with('success', 'Berhasil menghapus data buku');
        }
    }
}
