<?php

namespace App\Http\Controllers;

use App\Models\Drinks;
use Illuminate\Http\Request;

class DrinksController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos del frontend
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ]);
    
        // Crear una nueva instancia del modelo y asignar los valores recibidos
        $drink = new Drink();
        $drink->nombre = $request->input('nombre');
        $drink->descripcion = $request->input('descripcion');
        $drink->precio = $request->input('precio');
    
        // Guardar el nuevo registro en la base de datos
        $drink->save();
    
        // Devolver una respuesta indicando que se ha insertado correctamente
        return response()->json(['message' => 'Bebida creada correctamente'], 201);
    }
    
}