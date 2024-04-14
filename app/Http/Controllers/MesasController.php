<?php

namespace App\Http\Controllers;

use App\Models\Mesas;
use Illuminate\Http\Request;

class MesasController extends Controller
{
    public function store(Request $request)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'Id_area' => 'required|integer',
        'capacidad' => 'required|integer',
        'movible' => 'required|boolean',
        'disponible' => 'required|boolean',
        'unida' => 'nullable|boolean',
    ]);

    // Crear una nueva instancia del modelo y asignar los valores recibidos
    $mesa = new Mesa();
    $mesa->Id_area = $request->input('Id_area');
    $mesa->capacidad = $request->input('capacidad');
    $mesa->movible = $request->input('movible');
    $mesa->disponible = $request->input('disponible');
    $mesa->unida = $request->input('unida', false);

    // Guardar el nuevo registro en la base de datos
    $mesa->save();

    // Devolver una respuesta indicando que se ha insertado correctamente
    return response()->json(['message' => 'Mesa creada correctamente'], 201);
}

       public function get_mesas()
    {
    // Obtener todos los registros de la tabla areas_restaurante
         $mesas = Mesas::all();

    // Devolver una respuesta con todos los registros
        return response()->json($mesas, 200);
    }


    
    public function update(Request $request, $id)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'Id_area' => 'required|exists:areas_restaurante,id',
        'capacidad' => 'required|integer',
        'movible' => 'required|boolean',
        'disponible' => 'required|boolean',
        'unida' => 'required|boolean',
    ]);

    // Buscar la mesa por su ID
    $mesa = Mesa::find($id);

    // Verificar si la mesa fue encontrada
    if (!$mesa) {
        return response()->json(['message' => 'Mesa no encontrada'], 404);
    }

    // Actualizar los valores de la mesa con los nuevos valores recibidos
    $mesa->Id_area = $request->input('Id_area');
    $mesa->capacidad = $request->input('capacidad');
    $mesa->movible = $request->input('movible');
    $mesa->disponible = $request->input('disponible');
    $mesa->unida = $request->input('unida');

    // Guardar los cambios en la base de datos
    $mesa->save();

    // Devolver una respuesta indicando que se ha actualizado correctamente
    return response()->json(['message' => 'Mesa actualizada correctamente'], 200);
}


}
