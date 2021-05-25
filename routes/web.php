<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLogsControlller;
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

// Agar saat masuk ke web jika belum login maka akan di arahkan ke login, jika sudah login maka akan masuk ke halaman home
Route::get('/', function () {
    return redirect('/login');
});
