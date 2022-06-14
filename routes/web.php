<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KepalaController;
use App\Http\Controllers\PegawaiController;

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
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'storeLogin']);
Route::middleware('auth')->group(function(){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::middleware('is.admin')->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('/',[AdminController::class,'index']);
            Route::get('/quiz',[AdminController::class,'indexQuiz']);
        });
    });
    Route::middleware('is.kepala')->group(function(){
        Route::prefix('kepala')->group(function(){
            Route::get('/',[KepalaController::class,'index']);
        });
    });
    Route::middleware('is.pegawai')->group(function(){
        Route::get('/',[PegawaiController::class,'index']);
        Route::get('/apm', function () {
            return view('apm');
        });
        Route::get('/riwayat', function () {
            return view('riwayat');
        });
        Route::get('/hasil', function () {
            return view('hasil');
        });
        Route::get('/form', function () {
            return view('form');
        });
        Route::post('uji-coba', [AjaxController::class, 'getValue']);
    });
});

