<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Evento;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::paginate(10); // Paginación de entradas
        return view('entrada.index', compact('entradas'));
    }

    public function create()
    {
        $eventos = Evento::all(); // Obtener todos los eventos para el formulario
        return view('entrada.create', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id', // Validar que el evento exista
            'nombre_entrada' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        Entrada::create($request->all()); // Crea una nueva entrada
        return redirect()->route('entrada.index')->with('success', 'Entrada creada con éxito');
    }

    public function show(Entrada $entrada)
    {
        return view('entrada.show', compact('entrada'));
    }

    public function edit(Entrada $entrada)
    {
        $eventos = Evento::all(); // Obtener todos los eventos para el formulario
        return view('entrada.edit', compact('entrada', 'eventos'));
    }

    public function update(Request $request, Entrada $entrada)
    {
        $request->validate([
            'evento_id' => 'required|exists:eventos,id', // Validar que el evento exista
            'nombre_entrada' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        $entrada->update($request->all()); // Actualiza la entrada existente
        return redirect()->route('entrada.index')->with('success', 'Entrada actualizada con éxito');
    }

    public function destroy(Entrada $entrada)
    {
        $entrada->delete(); // Elimina la entrada
        return redirect()->route('entrada.index')->with('success', 'Entrada eliminada con éxito');
    }
}
