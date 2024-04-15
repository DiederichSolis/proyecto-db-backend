<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CuentaController extends Controller
{
    public function store(Request $request)
{
    // Valida los datos recibidos desde el frontend
    $request->validate([
        'id_mesa' => 'required|integer',
        'id_cliente' => 'required|string',
        'estado' => 'required|boolean',
        'total' => 'required|numeric',
    ]);

    // Verifica si el cliente ya tiene una cuenta con estado true
    $existingAccount = Cuenta::where('Id_cliente', $request->id_cliente)
        ->where('estado', true)
        ->first();

    if ($existingAccount) {
        return response()->json(['error' => 'El cliente ya tiene una cuenta abierta.'], 400);
    }

    // Crea una nueva instancia de Cuenta
    $cuenta = new Cuenta();
    $cuenta->Id_mesa = $request->id_mesa;
    $cuenta->Id_cliente = $request->id_cliente;
    $cuenta->estado = $request->estado;
    $cuenta->total = $request->total;

    $cuenta->fecha = Carbon::now();

    // Guarda la cuenta en la base de datos
    $cuenta->save();

    // Devuelve la cuenta creada como respuesta en formato JSON
    return response()->json($cuenta, 201);
}

public function desactivarCuenta(Request $request)
{
    // Valida los datos recibidos desde el frontend
    $request->validate([
        'id_mesa' => 'required|integer',
        'id_cliente' => 'required|string',
    ]);

    // Busca la cuenta del cliente con estado true y el ID de mesa dado
    $cuenta = Cuenta::where('Id_cliente', $request->id_cliente)
        ->where('Id_mesa', $request->id_mesa)
        ->where('estado', true)
        ->first();

    if ($cuenta) {
        // Cambia el estado de la cuenta a false
        $cuenta->estado = false;
        $cuenta->save();

        return response()->json(['message' => 'La cuenta ha sido desactivada.'], 200);
    } else {
        return response()->json(['error' => 'No se encontró una cuenta activa para desactivar.'], 404);
    }
}
    
    


    public function get_cuenta()
    {
    // Obtener todos los registros de la tabla areas_restaurante
         $cuenta = Cuenta::all();

    // Devolver una respuesta con todos los registros
        return response()->json($cuenta, 200);
    }

    public function getId(Request $request, $id)
{
    try {
        // Buscar la cuenta asociada a la mesa con estado true
        $cuenta = Cuenta::where('Id_mesa', $id) // Usa 'Id_mesa' con mayúscula inicial
                        ->where('estado', true)
                        ->firstOrFail(); // Esto arrojará un error si no se encuentra la cuenta
        
        return response()->json(['id_cuenta' => $cuenta->id]); // Usar la propiedad correcta para obtener el ID de la cuenta
    } catch (\Exception $e) {
        \Log::error('Error al buscar la cuenta: ' . $e->getMessage());
        return response()->json(['error' => 'No se pudo encontrar la cuenta asociada a esta mesa'], 404);
    }
}




}
