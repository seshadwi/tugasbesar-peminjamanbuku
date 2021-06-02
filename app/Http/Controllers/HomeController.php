<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['book'] = Count(Book::all());
        $data['book_logs'] = Count(BookLogs::where('id_peminjam', Auth::user()->id)->get());
        return view('home', $data);
    }
}
