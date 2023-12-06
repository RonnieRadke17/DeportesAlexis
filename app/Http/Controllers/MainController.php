<?php

// app/Http/Controllers/MainController.php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function index()
    {
        $datos['eventos'] = Evento::all();
        return view('main.index', $datos);
    }

    public function guardarEvento(Evento $evento)
    {
        Auth::user()->eventos()->attach($evento->id);

        return redirect()->back()->with('success', 'Evento guardado exitosamente.');
    }
    // Otros métodos del controlador...

    public function eventosInscritos()
    {
        $usuario = Auth::user();
        $eventosInscritos = $usuario->eventos;

        return view('main.inscritos', compact('eventosInscritos'));
    }

    
}
