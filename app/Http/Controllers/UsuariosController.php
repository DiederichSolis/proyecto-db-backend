<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuariosController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos del frontend
        $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
            'rol' => 'required|string',
            'correo' => 'required|string|email',
        ]);

        // Crear una nueva instancia del modelo y asignar los valores recibidos
        $usuario = new Usuario();
        $usuario->usuario = $request->input('usuario');
        $usuario->contrasena = $request->input('contrasena');
        $usuario->rol = $request->input('rol');
        $usuario->correo = $request->input('correo');

        // Guardar el nuevo registro en la base de datos
        $usuario->save();

        // Devolver una respuesta indicando que se ha insertado correctamente
        return response()->json(['message' => 'Usuario creado correctamente'], 201);
    }
    
    public function login(Request $request)
    {
        // Validar los datos recibidos del frontend
        $request->validate([
            'correo' => 'required|string|email',
            'contrasena' => 'required|string',
        ]);

        // Obtener el usuario por su correo
        $usuario = Usuario::where('correo', $request->input('correo'))->first();

        if (!$usuario) {
            return response()->json(['error' => 'Correo no encontrado'], 404);
        }

        if ($usuario->contrasena !== $request->input('contrasena')) {
            return response()->json(['error' => 'Contraseña incorrecta'], 401);
        }

        // Construir la respuesta con los datos necesarios
        $response = [
            'rol' => $usuario->rol,
            // Agrega más datos según lo necesites en tu frontend
        ];

        return response()->json($response, 200);
    }


    public function get_usuarios()
{
// Obtener todos los registros de la tabla areas_restaurante
     $usuarios= Usuario::all();

// Devolver una respuesta con todos los registros
    return response()->json($usuarios , 200);
}

public function update(Request $request, $id)
{
    // Validar los datos recibidos del frontend
    $request->validate([
        'usuario' => 'required|string',
        'contrasena' => 'required|string',
        'rol' => 'required|string',
        'correo' => 'required|email',
    ]);

    // Buscar el usuario por su ID
    $usuario = Usuario::find($id);

    // Verificar si el usuario fue encontrado
    if (!$usuario) {
        return response()->json(['message' => 'Usuario no encontrado'], 404);
    }

    // Actualizar los valores del usuario con los nuevos valores recibidos
    $usuario->usuario = $request->input('usuario');
    $usuario->contrasena = bcrypt($request->input('contrasena')); // Encriptar la contraseña
    $usuario->rol = $request->input('rol');
    $usuario->correo = $request->input('correo');

    // Guardar los cambios en la base de datos
    $usuario->save();

    // Devolver una respuesta indicando que se ha actualizado correctamente
    return response()->json(['message' => 'Usuario actualizado correctamente'], 200);
}

}
