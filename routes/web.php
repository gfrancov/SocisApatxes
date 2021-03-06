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
Route::get('/construccio', [UserController::class, 'construccio'])->name('construccio');
Route::get('/perfil', [UserController::class, 'perfil'])->name('perfil');
Route::get('/test', [UserController::class, 'test'])->name('test');

// Page seccions
Route::get('/katalakaska', [UserController::class, 'pageKatalakaska'])->name('seccio.katalakaska');
Route::get('/projectecoco', [UserController::class, 'pageProjecteCoco'])->name('seccio.projectecoco');
Route::get('/kapomba', [UserController::class, 'pageKapomba'])->name('seccio.kapomba');


// Junta
Route::get('/junta/cuotes', [JuntaController::class, 'cuotes'])->name('junta.cuotes');
Route::get('/junta/cuotes/pagada/{cuota?}', [JuntaController::class, 'cuotaPagada']);
Route::get('/junta/colonies', [JuntaController::class, 'colonies'])->name('junta.colonies');
Route::get('/junta/socis', [JuntaController::class, 'llistatSocis'])->name('junta.socis');
Route::get('/junta/soci/{soci?}', [JuntaController::class, 'gestionarSoci']);
Route::get('/junta/soci/activar/{soci?}', [JuntaController::class, 'activarSoci']);
Route::get('/junta/soci/inhabilitar/{soci?}', [JuntaController::class, 'inhabilitarSoci']);