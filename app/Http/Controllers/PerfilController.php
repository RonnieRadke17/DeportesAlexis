<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PerfilController extends Controller
{
    public function index()
{
    // Verificar si el usuario está autenticado
    if (auth()->check()) {
        // Usuario autenticado, obtener datos y pasarlos a la vista
        $usuario = auth()->user();
        return view('perfil.index', ['usuario' => $usuario]);
    } else {
        // Usuario no autenticado, redirigir o manejar según sea necesario
        return redirect('/login');
    }
}

    public function edit($id)
    {
        // Lógica para obtener los datos del usuario con ID $id
        $usuario = User::find($id);

        // Retorna la vista de edición con los datos del usuario
        return view('perfil.edit', ['usuario' => $usuario]);
    }

    //aqui va el update
public function update(Request $request, $id)
{
    // Validación de datos
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        'password' => 'nullable|string|min:6',
    ]);

    // Obtener el usuario
    $usuario = User::find($id);

    // Actualizar campos
    $usuario->name = $request->input('name');
    $usuario->email = $request->input('email');
    if ($request->filled('password')) {
        $usuario->password = bcrypt($request->input('password'));
    }

    // Guardar cambios
    $usuario->save();

    // Redirigir con un mensaje de éxito
    return redirect()->route('perfil.index');
}

public function destroy($id)//funciona siempre y cuando no esté registrado en nada el cliente
    {
        if (Auth::check()) {
            $usuario = Auth::user();

            if ($usuario) {
                $usuario = User::find($id)->delete();
                Auth::logout();

                return redirect('/');//la ruta está mal
            }
        }
    }


}
