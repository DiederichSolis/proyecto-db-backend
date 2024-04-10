<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaRestauranteController;
use App\Http\Controllers\ClienteController;

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
    return view('welcome');
});

//Rutas para tabla areas_restaurantes
Route::post('/areas', [AreaRestauranteController::class, 'store'])->name('areas.store');
Route::get('/test', [AreaRestauranteController::class, 'test']);
Route::post('/test', [AreaRestauranteController::class, 'test']);



//route para Tabla Cliente
Route::post('/clientes', [ClienteController::class, 'store']);