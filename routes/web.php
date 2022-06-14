<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

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
    return view('index');
});
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
Route::get('/login', function () {
    return view('login');
});
Route::get('/login2', function () {
    return view('auth-login-2');
});
Route::post('uji-coba', [AjaxController::class, 'getValue']);