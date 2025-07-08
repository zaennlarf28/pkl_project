<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Middleware\Admin;

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
    Route::get('/', [BackendController::class, 'index']);
    // crud
    Route::resource('/users', UserController::class);

});