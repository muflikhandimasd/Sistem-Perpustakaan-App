<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RakController;
use App\Http\Controllers\API\BukuController;
use App\Http\Controllers\API\AnggotaController;
use App\Http\Controllers\API\PetugasController;
use App\Http\Controllers\API\PenerbitController;
use App\Http\Controllers\API\PengarangController;
use App\Http\Controllers\API\PeminjamanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('/perpustakaans')->group(function () {
    Route::post('/raks', [RakController::class, 'create']);
    Route::post('/anggotas', [AnggotaController::class, 'create']);
    Route::post('/petugas', [PetugasController::class, 'create']);
    Route::post('/penerbits', [PenerbitController::class, 'create']);
    Route::post('/pengarangs', [PengarangController::class, 'create']);

    Route::post('/peminjamans', [PeminjamanController::class, 'create']);
    Route::post('/peminjamans/update/{id}', [PeminjamanController::class, 'update']);
    Route::get('/peminjamans', [PeminjamanController::class, 'index']);


    Route::post('/peminjamans/create_detail', [PeminjamanController::class, 'createPeminjamanDetail']);
    Route::post('/peminjamans/get_detail', [PeminjamanController::class, 'show']);


    Route::post('/bukus', [BukuController::class, 'create']);
    Route::get('/bukus', [BukuController::class, 'index']);
});
