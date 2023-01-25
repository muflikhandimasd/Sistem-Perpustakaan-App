<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\WebAnggotaController;

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
});
