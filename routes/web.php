<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaRestauranteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\PlatosController;
use App\Http\Controllers\DrinksController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\MeserosController;
use App\Http\Controllers\EncuestasController;
use App\Http\Controllers\QuejasController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\CuentaController;







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
Route::get('/getareas', [AreaRestauranteController::class, 'get_areas']);
Route::put('/updateareas', [AreaRestauranteController::class, 'update']);




//route para Tabla Cliente
Route::post('/clientes', [ClienteController::class, 'store']);
Route::get('/getclientes', [ClienteController::class, 'get_cliente']);



//route para usuarios
Route::post('/usuarios', [UsuariosController::class, 'store']);
Route::get('/getusuarios', [UsuariosController::class, 'get_usuarios']);
Route::put('/updateusuarios', [UsuariosController::class, 'update']);


//route para login 
Route::post('/login', [UsuariosController::class, 'login']);

//route oara mesas
Route::post('/mesas', [MesasController::class, 'store']);
Route::get('/getmesas/{id_area}', [MesasController::class, 'get_mesas']);

Route::put('/updatemesas', [MesasController::class, 'update']);




//route para cuenta
Route::post('/cuenta',[CuentaController::class, 'store']);
Route::get('/getcuenta', [CuentaController::class, 'get_cliente']);



//route para platos
Route::post('/platos',[PlatosController::class, 'store']);
Route::get('/getplatos', [PlatosController::class, 'get_platos']);


//route para drink
Route::post('/drinks',[DrinksController::class, 'store']);
Route::get('/getdrinks', [DrinksController::class, 'get_drinks']);




//route para ordenes
Route::post('/ordenes',[OrdenesController::class, 'store']);
Route::get('/getordenes', [OrdenesController::class, 'get_ordenes']);



//route para pagos
Route::post('/pagos',[PagosController::class, 'store']);
Route::get('/getpagos', [PagosController::class, 'get_pagos']);


//route para meseros
Route::post('/meseros',[MeserosController::class, 'store']);
Route::get('/getmeseros', [MeserosController::class, 'get_meseros']);



//route para encuestas
Route::post('/encuestas',[EncuestasController::class, 'store']);
Route::get('/getencuestas', [EncuestasController::class, 'get_encuestas']);


//route para quejas
Route::post('/quejas',[QuejasController::class, 'store']);
Route::get('/getquejas', [QuejasController::class, 'get_quejas']);



//route para facturas
Route::post('/facturas',[FacturasController::class, 'store']);
Route::get('/getfacturas', [FacturasController::class, 'get_facturas']);
