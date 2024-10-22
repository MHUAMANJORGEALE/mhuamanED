<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros = Evento::where('nombre_evento', 'LIKE', '%' . $texto . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('evento.index', compact(['registros', 'texto']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evento = new Evento();
        return view('evento.action', compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_evento' => 'required',
            'descripcion' => 'required',
            'fecha_evento' => 'required|date',
        ]);

        $registro = new Evento();
        $registro->nombre_evento = $request->input('nombre_evento');
        $registro->descripcion = $request->input('descripcion');
        $registro->fecha_evento = $request->input('fecha_evento');

        $registro->save();
        return redirect()->route('eventos.index')->with('mensaje', 'Registro ' . $registro->nombre_evento . ' creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        return view('evento.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('evento.action', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_evento' => 'required',
            'descripcion' => 'required',
            'fecha_evento' => 'required|date',
        ]);

        $registro = Evento::findOrFail($id);
        $registro->nombre_evento = $request->input('nombre_evento');
        $registro->descripcion = $request->input('descripcion');
        $registro->fecha_evento = $request->input('fecha_evento');

        $registro->save();
        return redirect()->route('eventos.index')->with('mensaje', 'Registro ' . $registro->nombre_evento . ' actualizado satisfactoriamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registro = Evento::findOrFail($id);
        $registro->delete();
        return redirect()->route('eventos.index')->with('mensaje', 'Registro ' . $registro->nombre_evento . ' eliminado correctamente.');
    }
}
