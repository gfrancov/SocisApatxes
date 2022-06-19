<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JuntaController;

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

Route::get('/',[UserController::class, 'formAcces']);

// User control
Route::get('/renovacio', [UserController::class, 'formRenovacio']);
Route::post('/renovacio/fet',[UserController::class, 'renovacio'])->name('renovacio');
Route::get('/acces', [UserController::class, 'formAcces']);
Route::post('/acces/fet', [UserController::class, 'acces'])->name('acces');
Route::get('/inici', [UserController::class, 'inici'])->name('inici');
Route::get('/sortir', [UserController::class, 'sortir'])->name('sortir');

// Junta
Route::get('/junta/cuotes', [JuntaController::class, 'cuotes'])->name('junta.cuotes');
Route::get('/junta/cuotes/pagada/{cuota?}', [JuntaController::class, 'cuotaPagada']);