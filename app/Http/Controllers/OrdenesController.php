<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\ordenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\OrdenesPlatos;




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

public function enviarBebida(Request $request)
{
    try {
        $idCuenta = $request->input('Id_cuenta'); // Obtener el ID de cuenta desde la solicitud

        if (!$idCuenta) {
            throw new \Exception('No se proporcionó el ID de cuenta.');
        }

        $idBebida = $request->input('Id_bebida');
        $cantidad = $request->input('cantidad_bebida');

        // Crear una nueva orden
        $ordenes = new ordenes();
        $ordenes->Id_cuenta = $idCuenta;
        $ordenes->Id_bebida = $idBebida;
        $ordenes->cantidad_bebida = $cantidad;
        $ordenes->estado = true; // Puedes ajustar el estado según sea necesario
        $ordenes->save();

        return response()->json(['message' => 'La bebida ha sido enviada correctamente.']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


}

