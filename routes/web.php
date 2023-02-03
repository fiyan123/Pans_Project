<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Siswa_dataController;

Auth::routes();


// Route Siswa
Route::get('/', [Siswa_dataController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Role Guru
Route::group(['prefix' => 'walikelas', 'middleware' => ['guru']], function() {
    Route::resource('nilai', NilaiController::class);
});

// Route Admin
Route::group(['prefix'=>'admin','middleware'=>['admin']], function() {
    Route::resource('guru', GuruController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('kelas', KelasController::class);
});

// Export Excel
Route::get('/downloadExcel', [NilaiController::class, 'downloadExcel'])->name('downloadExcel');
