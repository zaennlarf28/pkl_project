<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Guru;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route AKSES BLOKIR
// Route::middleware('is_admin')->group(function () {
//     // Route::resource('pengguna', PenggunasController::class);
// });

Route::group(['prefix'=>'admin', 'as' => 'backend.', 'middleware'=>['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index'])->name('dashboard');
    // crud
    Route::resource('/users', UserController::class);
    Route::resource('/dashboard', DashboardController::class);
});

Route::group(['prefix'=>'guru', 'as' => 'guru.', 'middleware'=>['auth', Guru::class]], function () {
    Route::get('/', [GuruController::class, 'index'])->name('dashboard');

    // Kelas
    Route::resource('kelas', \App\Http\Controllers\Guru\KelasController::class);

    // Tugas
    Route::get('kelas/{kelas}/tugas/create', [\App\Http\Controllers\Guru\TugasController::class, 'create'])->name('tugas.create');
    Route::post('kelas/{kelas}/tugas', [\App\Http\Controllers\Guru\TugasController::class, 'store'])->name('tugas.store');
});
