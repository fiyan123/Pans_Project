<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\NilaiController;
use App\Http\Controllers\Api\SiswaController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentikasi
// Route::post('/login', LoginController::class)->name('login');

// Data Kelas
Route::get('kelas', [KelasController::class, 'index']);
Route::post('kelas/create',[KelasController::class, 'store']);
Route::get('kelas/{id}/show',[KelasController::class, 'show']);
Route::put('kelas/{id}/edit',[KelasController::class, 'update']);
Route::delete('kelas/{id}/delete',[KelasController::class, 'destroy']);

// Data Guru
Route::get('guru', [GuruController::class,'index']);
Route::post('guru/create',[GuruController::class, 'store']);
Route::get('guru/{id}/show',[GuruController::class, 'show']);
Route::put('guru/{id}/edit',[GuruController::class, 'update']);
Route::delete('guru/{id}/delete',[GuruController::class, 'destroy']);

// Data Siswa
Route::get('siswa', [SiswaController::class, 'index']);
Route::post('siswa/create',[SiswaController::class, 'store']);
Route::get('siswa/{id}/show',[SiswaController::class, 'show']);
Route::put('siswa/{id}/edit',[SiswaController::class, 'update']);
Route::delete('siswa/{id}/delete',[SiswaController::class, 'destroy']);

// Data Nilai Siswa
Route::get('nilai', [NilaiController::class, 'index']);
Route::post('nilai/create',[NilaiController::class, 'store']);
Route::get('nilai/{id}/show',[NilaiController::class, 'show']);
Route::put('nilai/{id}/edit',[NilaiController::class, 'update']);
Route::delete('nilai/{id}/delete',[NilaiController::class, 'destroy']);

Route::get('test', [TestController::class, 'hello']);