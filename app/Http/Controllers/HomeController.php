<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.index');
    }
}
