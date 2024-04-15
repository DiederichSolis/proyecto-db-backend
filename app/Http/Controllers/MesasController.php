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
    $mesa = new Mesas();
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

public function get_mesas($id_area)
{
    $mesas = Mesas::where('Id_area', $id_area)->get();

    return response()->json($mesas, 200);
}




public function update($mesaId)
{
    $mesa = Mesas::find($mesaId);
    if (!$mesa) {
        return response()->json(['error' => 'Mesa no encontrada'], 404);
    }

    $nuevoEstado = !$mesa->disponible;
    $mesa->disponible = $nuevoEstado;
    $mesa->save();

    return response()->json(['message' => 'Estado de mesa actualizado correctamente', 'nuevoEstado' => $nuevoEstado]);
}






}
