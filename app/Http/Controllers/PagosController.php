<?php

namespace App\Http\Controllers;

use App\Models\Pagos;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'Id_cuenta' => 'required|integer',
        'total' => 'required|numeric',
        'metodo' => 'required|string',
        'fecha' => 'required|date',
    ]);

    // Crear una nueva instancia del modelo y asignar los valores recibidos
    $pago = new Pago();
    $pago->Id_cuenta = $request->input('Id_cuenta');
    $pago->total = $request->input('total');
    $pago->metodo = $request->input('metodo');
    $pago->fecha = $request->input('fecha');

    // Guardar el nuevo registro en la base de datos
    $pago->save();

    // Devolver una respuesta indicando que se ha insertado correctamente
    return response()->json(['message' => 'Pago creado correctamente'], 201);
}

public function get_pagos()
{
// Obtener todos los registros de la tabla areas_restaurante
     $pagos = Pagos::all();

// Devolver una respuesta con todos los registros
    return response()->json($pagos , 200);
}


}
