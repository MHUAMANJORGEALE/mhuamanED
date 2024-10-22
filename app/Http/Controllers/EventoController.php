<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::paginate(10); // Paginación
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_evento' => 'required',
            'descripcion' => 'required',
            'fecha_evento' => 'required|date',
        ]);

        Evento::create($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento creado con éxito');
    }

    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'nombre_evento' => 'required',
            'descripcion' => 'required',
            'fecha_evento' => 'required|date',
        ]);

        $evento->update($request->all());
        return redirect()->route('eventos.index')->with('success', 'Evento actualizado con éxito');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado con éxito');
    }
}

