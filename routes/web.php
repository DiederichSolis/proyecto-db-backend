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
Route::get('/obtenerAreas', [AreaRestauranteController::class, 'get_areas']);



//route para Tabla Cliente
Route::post('/clientes', [ClienteController::class, 'store']);


//route para usuarios
Route::post('/usuarios', [UsuariosController::class, 'store']);

//route para login 
Route::post('/login', [UsuariosController::class, 'login']);

//route oara mesas
Route::post('/mesas', [MesasController::class, 'store']);

//route para cuetna
Route::post('/cuenta',[CuentaController::class, 'store']);

//route para platos
Route::post('/platos',[PlatosController::class, 'store']);

//route para drink
Route::post('/drinks',[DrinksController::class, 'store']);

//route para ordenes
Route::post('/ordenes',[OrdenesController::class, 'store']);

//route para pagos
Route::post('/pagos',[PagosController::class, 'store']);

//route para meseros
Route::post('/meseros',[MeserosController::class, 'store']);

//route para encuestas
Route::post('/encuestas',[EncuestasController::class, 'store']);

//route para quejas
Route::post('/quejas',[QuejasController::class, 'store']);

//route para facturas
Route::post('/facturas',[FacturasController::class, 'store']);