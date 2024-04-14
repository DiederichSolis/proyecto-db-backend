<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos del frontend
        $request->validate([
            'Id_mesa' => 'required|integer',
            'Id_cliente' => 'required|integer',
            'estado' => 'required|boolean',
            'total' => 'required|numeric',
            'fecha' => 'required|date',
        ]);
    
        // Crear una nueva instancia del modelo y asignar los valores recibidos
        $cuenta = new Cuenta();
        $cuenta->Id_mesa = $request->input('Id_mesa');
        $cuenta->Id_cliente = $request->input('Id_cliente');
        $cuenta->estado = $request->input('estado');
        $cuenta->total = $request->input('total');
        $cuenta->fecha = $request->input('fecha');
    
        // Guardar el nuevo registro en la base de datos
        $cuenta->save();
    
        // Devolver una respuesta indicando que se ha insertado correctamente
        return response()->json(['message' => 'Cuenta creada correctamente'], 201);
    }
    


    public function get_cuenta()
    {
    // Obtener todos los registros de la tabla areas_restaurante
         $cuenta = Cuenta::all();

    // Devolver una respuesta con todos los registros
        return response()->json($cuenta, 200);
    }


}
