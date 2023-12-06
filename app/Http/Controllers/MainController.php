<?php

// app/Http/Controllers/MainController.php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $datos['eventos'] = Evento::all();
        return view('main.index', $datos);
    }

    // Otros métodos del controlador...
}
