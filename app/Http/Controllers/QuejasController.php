<?php

namespace App\Http\Controllers;

use App\Models\Quejas;
use Illuminate\Http\Request;

class QuejasController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos del frontend
        $request->validate([
            'Id_cliente' => 'required|integer',
            'motivo' => 'required|string',
            'clasificacion' => 'required|integer|min:1|max:5',
            'persona' => 'required|string',
            'Id_bebida' => 'nullable|integer',
            'Id_plato' => 'nullable|integer',
            'Id_mesa' => 'nullable|integer',
        ]);
    
        // Crear una nueva instancia del modelo y asignar los valores recibidos
        $queja = new Queja();
        $queja->Id_cliente = $request->input('Id_cliente');
        $queja->motivo = $request->input('motivo');
        $queja->clasificacion = $request->input('clasificacion');
        $queja->persona = $request->input('persona');
        $queja->Id_bebida = $request->input('Id_bebida');
        $queja->Id_plato = $request->input('Id_plato');
        $queja->Id_mesa = $request->input('Id_mesa');
    
        // Guardar el nuevo registro en la base de datos
        $queja->save();
    
        // Devolver una respuesta indicando que se ha insertado correctamente
        return response()->json(['message' => 'Queja creada correctamente'], 201);
    }
    
}
