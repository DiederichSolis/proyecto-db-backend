<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClienteController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'nombre' => 'required|string',
        'nit' => 'nullable|string',
        'direccion' => 'nullable|string',
    ]);

    // Crear una nueva instancia del modelo y asignar los valores recibidos
    $cliente = new Cliente();
    $cliente->nombre = $request->input('nombre');
    $cliente->nit = $request->input('nit');
    $cliente->direccion = $request->input('direccion');

    // Guardar el nuevo registro en la base de datos
    $cliente->save();

    // Devolver una respuesta indicando que se ha insertado correctamente
    return response()->json(['message' => 'Cliente creado correctamente'], 201);
}

}
