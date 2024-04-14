<?php

namespace App\Http\Controllers;

use App\Models\ordenes;
use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'Id_cuenta' => 'required|integer',
        'Id_plato' => 'required|integer',
        'Id_bebida' => 'required|integer',
        'cantidad' => 'required|integer',
    ]);

    // Crear una nueva instancia del modelo y asignar los valores recibidos
    $orden = new Orden();
    $orden->Id_cuenta = $request->input('Id_cuenta');
    $orden->Id_plato = $request->input('Id_plato');
    $orden->Id_bebida = $request->input('Id_bebida');
    $orden->cantidad = $request->input('cantidad');

    // Guardar el nuevo registro en la base de datos
    $orden->save();

    // Devolver una respuesta indicando que se ha insertado correctamente
    return response()->json(['message' => 'Orden creada correctamente'], 201);
}

}
