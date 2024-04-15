<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\ordenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\OrdenesPlatos;




class OrdenesController extends Controller
{
    

public function get_ordenes()
{
// Obtener todos los registros de la tabla areas_restaurante
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

public function enviarPlato(Request $request)
{
    try {
        $idCuenta = $request->input('Id_cuenta'); // Obtener el ID de cuenta desde la solicitud

        if (!$idCuenta) {
            throw new \Exception('No se proporcionó el ID de cuenta.');
        }

        $idPlato = $request->input('Id_plato');
        $cantidad = $request->input('cantidad_plato');

        // Crear una nueva orden de plato
        $ordenesPlatos = new OrdenesPlatos(); // Asegúrate de usar el modelo y la tabla correcta para orden de platos
        $ordenesPlatos->Id_cuenta = $idCuenta;
        $ordenesPlatos->Id_plato = $idPlato;
        $ordenesPlatos->cantidad_platos = $cantidad;
        $ordenesPlatos->estado = true; // Puedes ajustar el estado según sea necesario
        $ordenesPlatos->save();

        return response()->json(['message' => 'El plato ha sido enviado correctamente.']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}

