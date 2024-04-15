<?php

namespace App\Http\Controllers;

use App\Models\Platos;
use Illuminate\Http\Request;

class PlatosController extends Controller
{
   
    public function store(Request $request)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'nombre' => 'required|string',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric',
    ]);

    // Crear una nueva instancia del modelo y asignar los valores recibidos
    $plato = new Platos();
    $plato->nombre = $request->input('nombre');
    $plato->descripcion = $request->input('descripcion');
    $plato->precio = $request->input('precio');

    // Guardar el nuevo registro en la base de datos
    $plato->save();

    // Devolver una respuesta indicando que se ha insertado correctamente
    return response()->json(['message' => 'Plato creado correctamente'], 201);
}

public function get_platos()
{
// Obtener todos los registros de la tabla areas_restaurante
     $platos = Platos::all();

// Devolver una respuesta con todos los registros
    return response()->json($platos , 200);
}

}
