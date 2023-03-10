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

Auth::routes([
    'register' => false,
]);

Route::get('/register', function() {
    return redirect('/login');
});

// Route Siswa
Route::get('/', function () {
    return view('layouts.siswa');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');
Route::resource('/nilai_akhir',Siswa_dataController::class)->middleware('auth');
Route::get('/galeri', [GaleriController::class, 'index'])->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route Role Guru
Route::group(['prefix' => 'guru', 'middleware' => ['guru']], function() {
    Route::resource('nilai', NilaiController::class);
    Route::post('/nilai/store',[NilaiController::class,'CreateValidate']);

    // Route Data Dinamis
    Route::get('getsiswa/{id}', [NilaiController::class, 'getNamaSiswa']);

});

// Route Admin
Route::group(['prefix'=>'admin','middleware'=>['admin']], function() {
    Route::resource('guru', GuruController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('kelas', KelasController::class);
    
    // Route data dinamis
    Route::get('getsiswa/{id}', [SiswaController::class, 'getNamaSiswa']);

});

// Export Excel
Route::get('/downloadExcel', [NilaiController::class, 'downloadExcel'])->name('downloadExcel');
Route::get('/exportNilaiExcel', [Siswa_dataController::class, 'exportNilaiExcel'])->name('exportNilaiExcel');

// Print Pdf
Route::get('/printPdf', [Siswa_dataController::class, 'printPdf'])->name('printPdf');
