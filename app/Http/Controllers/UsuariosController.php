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
}