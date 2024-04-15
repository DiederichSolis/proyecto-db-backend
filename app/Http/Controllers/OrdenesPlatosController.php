<?php

namespace App\Http\Controllers;

use App\Models\OrdenesPlatos;
use Illuminate\Http\Request;

class OrdenesPlatosController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'Id_cuenta' => 'required|integer',
        'Id_plato' => 'required|integer',
        'cantidad_platos' => 'required|integer',

        'estado' => 'required|integer',
    ]);

    // Crear una nueva instancia del modelo y asignar los valores recibidos
    $orden = new Ordenesplatos();
    $orden->Id_cuenta = $request->input('Id_cuenta');
    $orden->Id_plato = $request->input('Id_plato');
    $orden->cantidad_platos = $request->input('cantidad_platos');

    $orden->estado = $request->input('estado');

    // Guardar el nuevo registro en la base de datos
    $orden->save();

    // Devolver una respuesta indicando que se ha insertado correctamente
    return response()->json(['message' => 'Orden creada correctamente'], 201);
}

public function get_ordenesplatos()
{
// Obtener todos los registros de la tabla areas_restaurante
     $ordenesplatos = Ordenesplatos::all();

// Devolver una respuesta con todos los registros
    return response()->json($ordenesplatos , 200);
}

}