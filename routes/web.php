<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('pesanans', 'livewire.pesanans.index')->middleware('auth');
	Route::view('rumahsakits', 'livewire.rumahsakits.index')->middleware('auth');
	Route::view('kategoris', 'livewire.kategoris.index')->middleware('auth');
	Route::view('supirs', 'livewire.supirs.index')->middleware('auth');
	Route::view('pelanggans', 'livewire.pelanggans.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
