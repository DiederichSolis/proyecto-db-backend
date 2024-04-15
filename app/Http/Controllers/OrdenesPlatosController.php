<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdenesPlatos;
use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'Id_cuenta' => 'required|integer',
        'Id_plato' => 'required|integer',
        'cantidad' => 'required|integer',

        'estado' => 'required|integer',
    ]);

    // Crear una nueva instancia del modelo y asignar los valores recibidos
    $orden = new ordenes();
    $orden->Id_cuenta = $request->input('Id_cuenta');
    $orden->Id_plato = $request->input('Id_plato');
    $orden->cantidad = $request->input('cantidad');

    $orden->estado = $request->input('estado');

    // Guardar el nuevo registro en la base de datos
    $orden->save();

    // Devolver una respuesta indicando que se ha insertado correctamente
    return response()->json(['message' => 'Orden creada correctamente'], 201);
}

public function get_ordenes()
{
// Obtener todos los registros de la tabla areas_restaurante
     $ordenes = ordenes::all();

// Devolver una respuesta con todos los registros
    return response()->json($ordenes , 200);
}


}



