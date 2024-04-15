<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class ClienteController extends Controller
{


public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->nit = $request->input('nit');
        $cliente->direccion = $request->input('direccion');
        $cliente->save();

        return response()->json(['message' => 'Cliente creado correctamente'], 201);
    }



}
