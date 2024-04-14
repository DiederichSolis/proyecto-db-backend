<?php

namespace App\Http\Controllers;

use App\Models\Meseros;
use Illuminate\Http\Request;

class MeserosController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'nombre' => 'required|string',
        'Id_mesa' => 'required|integer',
    ]);

    // Crear una nueva instancia del modelo y asignar los valores recibidos
    $mesero = new Mesero();
    $mesero->nombre = $request->input('nombre');
    $mesero->Id_mesa = $request->input('Id_mesa');

    // Guardar el nuevo registro en la base de datos
    $mesero->save();

    // Devolver una respuesta indicando que se ha insertado correctamente
    return response()->json(['message' => 'Mesero creado correctamente'], 201);
}

public function get_meseros()
{
// Obtener todos los registros de la tabla areas_restaurante
     $meseros = Meseros::all();

// Devolver una respuesta con todos los registros
    return response()->json($meseros , 200);
}

}