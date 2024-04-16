<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

use App\Models\OrdenesPlatos;
use Illuminate\Http\Request;

class OrdenesPlatosController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'Id_cuenta' => 'required|integer',
        'Id_plato' => 'required|integer',
        'cantidad_platos' => 'required|integer',

        'estado' => 'required|integer',
    ]);

    // Crear una nueva instancia del modelo y asignar los valores recibidos
    $orden = new Ordenesplatos();
    $orden->Id_cuenta = $request->input('Id_cuenta');
    $orden->Id_plato = $request->input('Id_plato');
    $orden->cantidad_platos = $request->input('cantidad_platos');

    $orden->estado = $request->input('estado');

    // Guardar el nuevo registro en la base de datos
    $orden->save();

    // Devolver una respuesta indicando que se ha insertado correctamente
    return response()->json(['message' => 'Orden creada correctamente'], 201);
}

public function enviarPlato(Request $request)
{
    try {
        $idCuenta = $request->input('Id_cuenta'); // Obtener el ID de cuenta desde la solicitud

        if (!$idCuenta) {
            throw new \Exception('No se proporcionó el ID de cuenta.');
        }

        $idPlato = $request->input('Id_plato');
        $cantidad = $request->input('cantidad_platos');

        // Crear una nueva orden
        $ordenes = new OrdenesPlatos();
        $ordenes->Id_cuenta = $idCuenta;
        $ordenes->Id_plato = $idPlato;
        $ordenes->cantidad_platos = $cantidad;
        $ordenes->estado = true; // Puedes ajustar el estado según sea necesario
        $ordenes->save();

        return response()->json(['message' => 'El plato ha sido enviado correctamente.']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


public function get_ordenesplatos()
{
// Obtener todos los registros de la tabla areas_restaurante
     $ordenesplatos = OrdenesPlatos::all();

// Devolver una respuesta con todos los registros
    return response()->json($ordenesplatos , 200);
}


}



