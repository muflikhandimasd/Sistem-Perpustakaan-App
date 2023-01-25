<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\WebRakController;
use App\Http\Controllers\WEB\WebAnggotaController;
use App\Http\Controllers\WEB\WebPetugasController;
use App\Http\Controllers\WEB\WebPenerbitController;
use App\Http\Controllers\WEB\WebPengarangController;

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

Route::get('/', function () {
    return view('layouts.main');
});
Route::prefix('/perpustakaans')->group(function () {

    Route::prefix('/anggotas')->group(function () {
        Route::get('/', [WebAnggotaController::class, 'index'])->name('anggota.index');
        Route::post('/', [WebAnggotaController::class, 'store'])->name('anggota.store');
        Route::get('/create', [WebAnggotaController::class, 'create'])->name('anggota.create');
        Route::get('/edit/{id}', [WebAnggotaController::class, 'edit'])->name('anggota.edit');
        Route::get('/delete/{id}', [WebAnggotaController::class, 'destroy'])->name('anggota.delete');
        Route::post('/edit/{id}', [WebAnggotaController::class, 'update'])->name('anggota.update');
    });

    Route::prefix('/petugas')->group(function () {
        Route::get('/', [WebPetugasController::class, 'index'])->name('petugas.index');
        Route::get('/create', [WebPetugasController::class, 'create'])->name('petugas.create');
        Route::post('/', [WebPetugasController::class, 'store'])->name('petugas.store');
        Route::get('/edit/{id}', [WebPetugasController::class, 'edit'])->name('petugas.edit');
        Route::post('/update/{id}', [WebPetugasController::class, 'update'])->name('petugas.update');
        Route::get('/delete/{id}', [WebPetugasController::class, 'destroy'])->name('petugas.destroy');
    });

    Route::prefix('/pengarangs')->group(function () {
        Route::get('/', [WebPengarangController::class, 'index'])->name('pengarang.index');
        Route::get('/create', [WebPengarangController::class, 'create'])->name('pengarang.create');
        Route::post('/', [WebPengarangController::class, 'store'])->name('pengarang.store');
        Route::get('/edit/{id}', [WebPengarangController::class, 'edit'])->name('pengarang.edit');
        Route::post('/update/{id}', [WebPengarangController::class, 'update'])->name('pengarang.update');
        Route::get('/delete/{id}', [WebPengarangController::class, 'destroy'])->name('pengarang.destroy');
    });

    Route::prefix('/penerbits')->group(function () {
        Route::get('/', [WebPenerbitController::class, 'index'])->name('penerbit.index');
        Route::get('/create', [WebPenerbitController::class, 'create'])->name('penerbit.create');
        Route::post('/', [WebPenerbitController::class, 'store'])->name('penerbit.store');
        Route::get('/edit/{id}', [WebPenerbitController::class, 'edit'])->name('penerbit.edit');
        Route::post('/update/{id}', [WebPenerbitController::class, 'update'])->name('penerbit.update');
        Route::get('/delete/{id}', [WebPenerbitController::class, 'destroy'])->name('penerbit.destroy');
    });


    Route::prefix('/raks')->group(function () {
        Route::get('/', [WebRakController::class, 'index'])->name('rak.index');
        Route::get('/create', [WebRakController::class, 'create'])->name('rak.create');
        Route::post('/', [WebRakController::class, 'store'])->name('rak.store');
        Route::get('/edit/{id}', [WebRakController::class, 'edit'])->name('rak.edit');
        Route::post('/update/{id}', [WebRakController::class, 'update'])->name('rak.update');
        Route::get('/delete/{id}', [WebRakController::class, 'destroy'])->name('rak.destroy');
    });
});
