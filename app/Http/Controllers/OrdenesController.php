<?php

namespace App\Http\Controllers;

use App\Models\ordenes;
use Illuminate\Http\Request;

class OrdenesController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validar los datos recibidos del frontend
            $request->validate([
                'Id_cuenta' => 'required|integer',
                'Id_bebida' => 'required|integer',
                'cantidad_bebida' => 'required|integer',
                'estado' => 'required|integer',
            ]);

            // Crear una nueva instancia del modelo y asignar los valores recibidos
            $orden = new ordenes();
            $orden->Id_cuenta = $request->input('Id_cuenta');
            $orden->Id_bebida = $request->input('Id_bebida');
            $orden->cantidad_bebida = $request->input('cantidad_bebida');
            $orden->estado = $request->input('estado');

            // Guardar el nuevo registro en la base de datos
            $orden->save();

            // Devolver una respuesta indicando que se ha insertado correctamente
            return response()->json(['message' => 'Orden creada correctamente'], 201);
        } catch (QueryException $e) {
            // Si ocurre un error al guardar en la base de datos, devolver un mensaje de error
            return response()->json(['message' => 'Error al crear la orden: ' . $e->getMessage()], 500);
        }
    }

public function get_ordenes()
{
    
     $ordenes = ordenes::all();

// Devolver una respuesta con todos los registros
    return response()->json($ordenes , 200);
}

}
