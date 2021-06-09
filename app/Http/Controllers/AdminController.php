<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AdminController extends Controller
{
    public function index()
    {
        $data['book'] = Count(Book::all());
        return view('admin.index', $data);
    }
}
