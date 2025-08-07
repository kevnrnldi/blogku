<?php

use App\Http\Controllers\ArtikelController;
use App\Models\Artikel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});



Route::get('/home', [ArtikelController::class, 'index'])->name('artikel.index');

Route::get('/artikel/tambah', [ArtikelController::class, 'create'])->name('artikel.create');
Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/{artikel}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::post('/artikel/{id}/update', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/{id}/delete', [ArtikelController::class, 'destroy'])->name('artikel.destroy');