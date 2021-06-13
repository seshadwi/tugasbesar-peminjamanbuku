<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BooksLogsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageBookController;
use App\Http\Controllers\PeminjamanController;
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

Route::get('/login/admin', [AuthAdminController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/login/admin', [AuthAdminController::class, 'loginAdmin'])->name('admin.login');
Route::get('admin', [AdminController::class, 'index'])->name('admin.home');
Route::resource('admin/bookmanage', ManageBookController::class);
Route::resource('admin/logsmanage', PeminjamanController::class);



// route untuk tampilan home
Route::get('/home', [BookController::class, 'home'])->name('home');
// route resource untuk tampilan pengelolaan buku
Route::resource('book', BookController::class, ['except' => ['create', 'store', 'update', 'destroy']]);
Route::get('book/pinjam/{id}', [BookController::class, "pinjam"])->name('book.pinjam');
Route::post('book/storepinjam', [BookController::class, "storepinjam"])->name('book.storepinjam');
Route::resource('booklogs', BooksLogsController::class,  ['except' => ['create', 'store', 'update', 'destroy', 'show', 'edit']]);
Route::get('booklogs/kembali/{id}', [BooksLogsController::class, "kembalikan"])->name('booklogs.kembali');
Route::get('booklogs/cetakbukti/{id}', [BooksLogsController::class, "cetak_bukti"])->name('booklogs.cetak');

Route::get('/', [HomeController::class, 'index'])->name('welcome');
