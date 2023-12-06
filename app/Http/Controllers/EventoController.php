<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['eventos'] = Evento::paginate(10);
        return view('evento.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'tipo' => 'required|in:Deportivo,Cultural',
            'lugar' => 'required|in:Polideportivo La Plata,Universidad Politécnica de Pachuca',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'imagen.required' => 'La imagen es requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosEvento = $request->except('_token');

        if ($request->hasFile('imagen')) {
            $datosEvento['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        Evento::create($datosEvento);

        return redirect('evento')->with('mensaje', 'Evento agregado con éxito');
    }

    // Resto de los métodos del controlador...
    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('evento.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $campos = [
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string',
        'fecha' => 'required|date',
        'hora' => 'required|date_format:H:i',
        'tipo' => 'required|in:Deportivo,Cultural',
        'lugar' => 'required|in:Polideportivo La Plata,Universidad Politécnica de Pachuca',
        'imagen' => 'image|mimes:jpeg,png,jpg|max:10000',
    ];

    $mensaje = [
        'required' => 'El :attribute es requerido',
    ];

    $this->validate($request, $campos, $mensaje);

    $datosEvento = $request->except(['_token', '_method']);

    if ($request->hasFile('imagen')) {
        $evento = Evento::findOrFail($id);

        

        // Store the new image
        $datosEvento['imagen'] = $request->file('imagen')->store('uploads', 'public');
    }

    // Update the database record with the new data
    Evento::where('id', '=', $id)->update($datosEvento);

    return redirect('evento')->with('mensaje', 'Evento Modificado');
}

/**
 * Display the specified resource.
 */
public function show($id)
{
    $evento = Evento::findOrFail($id);
    return view('evento.show', compact('evento'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);

        // Elimina el evento sin borrar la imagen
        Evento::destroy($id);

        return redirect('evento')->with('mensaje', 'Evento borrado');
    }
}