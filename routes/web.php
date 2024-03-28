<?php

use App\Http\Livewire\User\Home;
use App\Http\Livewire\User\Kontak;
use App\Http\Livewire\User\Riwayat;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//Route Hooks - Do not delete//
    Auth::routes();
// middleware admin
Route::middleware('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('pesanans', 'livewire.pesanans.index')->middleware('auth');
    Route::view('rumahsakits', 'livewire.rumahsakits.index')->middleware('auth');
    Route::view('kategoris', 'livewire.kategoris.index')->middleware('auth');
    Route::view('supirs', 'livewire.supirs.index')->middleware('auth');
    Route::view('pelanggans', 'livewire.pelanggans.index')->middleware('auth');
    Route::view('users', 'livewire.users.index')->middleware('auth');
});
Route::get('/', Home::class)->name('user.home');
Route::get('/kontak', Kontak::class)->name('user.kontak');
// middleware pelanggan
Route::middleware('pelanggan')->group(function () {
    Route::get('/riwayat', Riwayat::class)->name('user.riwayat');
});
