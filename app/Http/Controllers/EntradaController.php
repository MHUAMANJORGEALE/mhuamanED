<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Evento;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::paginate(10);
        return view('entradas.index', compact('entradas'));
    }

    public function create()
    {
        $eventos = Evento::all();
        return view('entradas.create', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'nombre_entrada' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        Entrada::create($request->all());
        return redirect()->route('entradas.index')->with('success', 'Entrada creada con éxito');
    }

    public function show(Entrada $entrada)
    {
        return view('entradas.show', compact('entrada'));
    }

    public function edit(Entrada $entrada)
    {
        $eventos = Evento::all();
        return view('entradas.edit', compact('entrada', 'eventos'));
    }

    public function update(Request $request, Entrada $entrada)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id',
            'nombre_entrada' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        $entrada->update($request->all());
        return redirect()->route('entradas.index')->with('success', 'Entrada actualizada con éxito');
    }

    public function destroy(Entrada $entrada)
    {
        $entrada->delete();
        return redirect()->route('entradas.index')->with('success', 'Entrada eliminada con éxito');
    }
}
