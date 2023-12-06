<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UsuariosController extends Controller
{//aqui mostramos todos los usuarios del sistema y en específico
    public function index()
    {
        $users = User::all(); // Obtener todos los usuarios de la tabla 'users'
        return view('usuarios.index', compact('users'));
    }

    public function show(string $id)//mostrar la tarea en específico
    {
        // Obtener el trabajo específico por su ID
        $usuario = User::findOrFail($id);

        // Pasar el trabajo a la vista
        return view('usuarios.show', compact('usuario'));
    }




}
