<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware('is.admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'index']);
            Route::get('/quiz', [AdminController::class, 'indexQuiz']);
            Route::post('/quiz', [QuizController::class, 'storeQuiz']);
            Route::post('/quiz/{quizID}/update', [QuizController::class, 'updateQuiz']);
            Route::get('/quiz/{quizID}/delete', [QuizController::class, 'deleteQuiz']);
            Route::get('/quiz/{quizID}/update-status', [QuizController::class, 'updateQuizStatus']);
            Route::get('/quiz/{quizID}/questions', [QuizController::class, 'quizQuestions']);
            Route::post('/quiz/{quizID}/store-question', [QuizController::class, 'storeQuestion']);
            Route::post('/quiz/{questionID}/update-question', [QuizController::class, 'updateQuestion']);
            Route::get('/quiz/{questionID}/delete-question', [QuizController::class, 'deleteQuestion']);
            Route::get('/quiz/{questionID}/options', [QuizController::class, 'questionOptions']);
            Route::post('/quiz/{questionID}/store-option', [QuizController::class, 'storeOption']);
            Route::post('/quiz/{optionID}/update-option', [QuizController::class, 'updateOption']);
            Route::get('/quiz/{optionID}/delete-option', [QuizController::class, 'deleteOption']);
        });
    });
    Route::middleware('is.kepala')->group(function () {
        Route::prefix('kepala')->group(function () {
            Route::get('/', [KepalaController::class, 'index']);
        });
    });
    Route::middleware('is.pegawai')->group(function () {
        Route::get('/', [PegawaiController::class, 'index']);
        Route::get('/apm', function () {
            return view('apm');
        });

        // Route::get('/riwayat', [PegawaiController::class, 'riwayatTest']);
        Route::get('/riwayat-quiz', [PegawaiController::class, 'indexQuiz']);
        Route::get('/quiz/{quizID}/show', [PegawaiController::class, 'showQuiz']);
        Route::get('/riwayat-test', [PegawaiController::class, 'riwayatTest']);
        Route::get('/hasil', function () {
            return view('hasil');
        });
        // Route::get('/form', function () {
        //     return view('form');
        // });
        Route::post('uji-coba', [AjaxController::class, 'getValue']);
        // Route::get('get-value', [PegawaiController::class, 'showApm']);
    });
});
