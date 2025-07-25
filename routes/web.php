<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pengurusan_pengguna', function () {
    return view('pengurusan_pengguna');
})->name('pengurusan.pengguna');

Route::get('/maklumat_pengguna', function () {
    return view('maklumat_pengguna');
})->name('pengurusan.pengguna');

Route::get('/Pengguna_berjaya_didaftarkan', function () {
    return view('Pengguna_berjaya_didaftarkan');
})->name('pengurusan.pengguna');

Route::get('/Laporan', function () {
    return view('Laporan');
})->name('pengurusan.pengguna');

Route::get('/Audit', function () {
    return view('Audit');
})->name('pengurusan.pengguna');

Route::get('/Maklumat_Pengguna2', function () {
    return view('Maklumat_Pengguna2');
})->name('pengurusan.pengguna');

Route::get('/Log_Details_Information', function () {
    return view('Log_Details_Information');
})->name('pengurusan.pengguna');

Route::get('/Calender', function () {
    return view('Calender');
})->name('pengurusan.pengguna');
