<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;

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

Route::get('/', [AgendaController::class, 'index'])->middleware('auth')->name('welcome');
Route::get('/agenda/criar', [AgendaController::class, 'create'])->middleware('auth');
Route::post('/agenda', [AgendaController::class, 'store']);



Route::get('/agenda/editar/{id}', [AgendaController::class, 'edit'])->middleware('auth');
Route::post('/agenda/update/{id}', [AgendaController::class, 'update'])->middleware('auth');
Route::delete('/agenda/{id}', [AgendaController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard', [AgendaController::class, 'index'])->middleware('auth')->name('dashboard');

