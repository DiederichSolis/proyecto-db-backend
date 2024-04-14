<?php

namespace App\Http\Controllers;

use App\Models\Encuestas;
use Illuminate\Http\Request;

class EncuestasController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos del frontend
        $request->validate([
            'Id_cliente' => 'required|integer',
            'calificacion_amabilidad' => 'required|integer|min:1|max:5',
            'calificacion_exactitud' => 'required|integer|min:1|max:5',
        ]);
    
        // Crear una nueva instancia del modelo y asignar los valores recibidos
        $encuesta = new Encuesta();
        $encuesta->Id_cliente = $request->input('Id_cliente');
        $encuesta->calificacion_amabilidad = $request->input('calificacion_amabilidad');
        $encuesta->calificacion_exactitud = $request->input('calificacion_exactitud');
    
        // Guardar el nuevo registro en la base de datos
        $encuesta->save();
    
        // Devolver una respuesta indicando que se ha insertado correctamente
        return response()->json(['message' => 'Encuesta creada correctamente'], 201);
    }

    public function get_encuestas()
    {
    // Obtener todos los registros de la tabla areas_restaurante
         $encuestas = Encuestas::all();

    // Devolver una respuesta con todos los registros
        return response()->json($encuestas, 200);
    }

}
