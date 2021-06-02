<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLogsControlller;
use App\Http\Controllers\BooksLogsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

// route untuk tampilan home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route resource untuk tampilan pengelolaan buku
Route::resource('book', BookController::class);
Route::get('book/pinjam/{id}', [BookController::class, "pinjam"])->name('book.pinjam');
Route::post('book/storepinjam', [BookController::class, "storepinjam"])->name('book.storepinjam');

Route::resource('booklogs', BooksLogsController::class);

// Agar saat masuk ke web jika belum login maka akan di arahkan ke login, jika sudah login maka akan masuk ke halaman home
Route::get('/', function () {
    return redirect('/login');
});
