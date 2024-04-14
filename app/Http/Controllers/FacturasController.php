<?php

namespace App\Http\Controllers;

use App\Models\Facturas;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos del frontend
        $request->validate([
            'Id_cuenta' => 'required|integer',
            'total' => 'required|numeric',
            'fecha' => 'required|date',
            'propina' => 'required|numeric',
            'Id_plato' => 'nullable|integer',
            'Id_bebida' => 'nullable|integer',
        ]);
    
        // Crear una nueva instancia del modelo y asignar los valores recibidos
        $factura = new Factura();
        $factura->Id_cuenta = $request->input('Id_cuenta');
        $factura->total = $request->input('total');
        $factura->fecha = $request->input('fecha');
        $factura->propina = $request->input('propina');
        $factura->Id_plato = $request->input('Id_plato');
        $factura->Id_bebida = $request->input('Id_bebida');
    
        // Guardar el nuevo registro en la base de datos
        $factura->save();
    
        // Devolver una respuesta indicando que se ha insertado correctamente
        return response()->json(['message' => 'Factura creada correctamente'], 201);
    }
    
    public function get_facturas()
    {
    // Obtener todos los registros de la tabla areas_restaurante
         $facturas = Facturas::all();

    // Devolver una respuesta con todos los registros
        return response()->json($facturas, 200);
    }
}
