<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApmController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KepalaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;

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
// Testing
// Route::get('/profile', function () {
//     return view('admin.profile');
// });
// Scan
Route::get('/barcode-scanner', function () {
    return view('scan-barcode');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'viewProfileAdmin']);
    Route::post('/profile', [ProfileController::class, 'storeProfileAdmin']);
});
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/search-pegawai', [AjaxController::class, 'getPegawai']);
    Route::post('/search-kepala', [AjaxController::class, 'getKepala']);
    Route::post('/update-status-test', [AjaxController::class, 'updateStatusTest']);
    Route::middleware('is.admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'index']);
            Route::get('/quiz', [AdminController::class, 'indexQuiz']);
            Route::get('/data-pegawai', [AdminController::class, 'viewPegawai']);
            Route::post('/add-pegawai', [AdminController::class, 'storePegawai']);
            Route::post('/update-pegawai/{id}', [AdminController::class, 'updatePegawai']);
            Route::post('/delete-pegawai/{id}', [AdminController::class, 'destroyPegawai']);
            Route::post('/status-pegawai/{id}', [AdminController::class, 'statusPegawai']);
            Route::get('/data-kepala', [AdminController::class, 'viewKepala']);
            Route::post('/add-kepala', [AdminController::class, 'storeKepala']);
            Route::post('/update-kepala/{id}', [AdminController::class, 'updateKepala']);
            Route::post('/delete-kepala/{id}', [AdminController::class, 'destroyKepala']);
            Route::post('/status-kepala/{id}', [AdminController::class, 'statusKepala']);
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
            Route::get('/data-pegawai', [KepalaController::class, 'viewPegawai']);
            Route::post('/add-pegawai', [KepalaController::class, 'storePegawai']);
            Route::post('/update-pegawai/{id}', [KepalaController::class, 'updatePegawai']);
            Route::post('/delete-pegawai/{id}', [KepalaController::class, 'destroyPegawai']);
            Route::post('/status-pegawai/{id}', [KepalaController::class, 'statusPegawai']);
        });
    });
    Route::middleware('is.pegawai')->group(function () {
        Route::get('/', [PegawaiController::class, 'index']);
        Route::get('/apm', [ApmController::class, 'index']);
        // Route::get('/riwayat', [PegawaiController::class, 'riwayatTest']);
        Route::get('/sleep-kuisioner',[PegawaiController::class,'showSleepKuisioner']);
        Route::post('/sleep-kuisioner',[QuizController::class,'storeSleepKuisioner']);
        Route::get('/riwayat-quiz', [PegawaiController::class, 'indexQuiz']);
        Route::get('/quiz/{quizID}/show', [PegawaiController::class, 'showQuiz']);
        Route::post('/quiz/{quizID}/submit-answer', [QuizController::class, 'submitAnswer']);
        // Route::get('/riwayat-test', [PegawaiController::class, 'riwayatTest']);
        Route::get('/riwayat-test', [ApmController::class, 'testHistory']);
        Route::get('/riwayat-test/{apmID}/barcode', [ApmController::class, 'showBarcode']);
        Route::get('/hasil', function () {
            return view('hasil');
        });
        Route::post('uji-coba', [AjaxController::class, 'getValue']);
        Route::get('/test',[TestController::class,'index']);
        Route::post('/test',[TestController::class,'update']);
        // Route::get('get-value', [PegawaiController::class, 'showApm']);
    });
    Route::get('/apm-test/scan/{apmID}/detail', [ApmController::class, 'scanBarcode']);
});
