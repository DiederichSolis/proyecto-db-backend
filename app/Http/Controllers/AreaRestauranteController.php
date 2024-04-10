<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaRestaurante;

class AreaRestauranteController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos del frontend
        $request->validate([
            'nombre' => 'required|string',
            'fumadores' => 'nullable|boolean',
            'movilidad_mesas' => 'nullable|boolean',
        ]);

        // Crear una nueva instancia del modelo y asignar los valores recibidos
        $area = new AreaRestaurante();
        $area->nombre = $request->input('nombre');
        $area->fumadores = $request->input('fumadores');
        $area->movilidad_mesas = $request->input('movilidad_mesas');

        // Guardar el nuevo registro en la base de datos
        $area->save();

        // Devolver una respuesta indicando que se ha insertado correctamente
        return response()->json(['message' => 'Área restaurante creada correctamente'], 201);
    }
    
    public function test()
    {
        // Crear un registro de prueba en la tabla areas_restaurante
        $area = new AreaRestaurante();
        $area->nombre = 'Área de prueba';
        $area->fumadores = true;
        $area->movilidad_mesas = false;
        $area->save();

        return response()->json(['message' => 'Registro de prueba creado correctamente'], 200);
    }
}
