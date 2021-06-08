<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BooksLogsController;
use App\Http\Controllers\HomeController;
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

Route::get('/login/admin', [AdminController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/login/admin', [AdminController::class, 'loginAdmin'])->name('admin.login');

// route untuk tampilan home
Route::get('/home', [BookController::class, 'home'])->name('home');
// route resource untuk tampilan pengelolaan buku
Route::resource('book', BookController::class);
Route::get('book/pinjam/{id}', [BookController::class, "pinjam"])->name('book.pinjam');
Route::post('book/storepinjam', [BookController::class, "storepinjam"])->name('book.storepinjam');
Route::resource('booklogs', BooksLogsController::class);
Route::get('booklogs/kembali/{id}', [BooksLogsController::class, "kembalikan"])->name('booklogs.kembali');

Route::get('/', [HomeController::class, 'index'])->name('welcome');
