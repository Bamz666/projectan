<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Helo world";
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/destroy/{id_mahasiswa}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/edit/{id_mahasiswa}', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/update/{id_mahasiswa}', [AdminController::class, 'update'])->name('admin.update');

Route::get('/matkul', [App\Http\Controllers\MatkulController::class, 'index'])->name('matkul');
Route::get('/matkul/create', [MatkulController::class, 'create'])->name('matkul.create');
Route::post('/matkul/store', [MatkulController::class, 'store'])->name('matkul.store');
Route::get('/matkul/destroy/{id_matakuliah}', [MatkulController::class, 'destroy'])->name('matkul.destroy');
Route::get('/matkul/edit/{id_matakuliah}', [MatkulController::class, 'edit'])->name('matkul.edit');
Route::put('/matkul/update/{id_matakuliah}', [MatkulController::class, 'update'])->name('matkul.update');

Route::get('/nilai', [App\Http\Controllers\NilaiController::class, 'index'])->name('nilai');
Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
Route::post('/nilai/store', [NilaiController::class, 'store'])->name('nilai.store');
Route::get('/nilai/destroy/{id_nilai}', [NilaiController::class, 'destroy'])->name('nilai.destroy');
Route::get('/nilai/edit/{id_nilai}', [NilaiController::class, 'edit'])->name('nilai.edit');
Route::put('/nilai/update/{id_nilai}', [NilaiController::class, 'update'])->name('nilai.update');

// ===================================CARA LAIN===========================================

// Auth::routes();
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route admin
// Route::resource('admin', AdminController::class);

// route buku
// Route::resource('buku', BukuController::class)->except(['destroy']);
// Route::get('/buku/delete/{id_nilai}', [BukuController::class, 'delete'])->name('buku.delete');

// route kategori
// Route::resource('kategori', KategoriController::class)->except(['destroy']);
// Route::get('/kategori/delete/{id_nilai}', [KategoriController::class, 'delete'])->name('kategori.delete');

// route penerbit
// Route::resource('penerbit', PenerbitController::class)->except(['destroy']);
// Route::get('/penerbit/delete/{id_nilai}', [PenerbitController::class, 'delete'])->name('penerbit.delete');
