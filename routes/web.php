<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisPeralatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/peralatan', [JenisPeralatanController::class, 'data']);
    Route::get('/peralatan/add', [JenisPeralatanController::class, 'add']);
    Route::post('/peralatan', [JenisPeralatanController::class, 'addProcess']);
    Route::get('/peralatan/edit/{id}', [JenisPeralatanController::class, 'edit']);
    Route::patch('peralatan/{id}', [JenisPeralatanController::class, 'editProcess']);
    Route::delete('peralatan/{id}', [JenisPeralatanController::class, 'delete']);
});
