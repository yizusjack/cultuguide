<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\Lugar;
use Illuminate\Support\Carbon;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::with('lugares')->get();

        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lugares = Lugar::all();

        return view('eventos.create', compact('lugares'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');

        $request->validate([
            'nombre' => ['required', 'max:255'],
            'descripcion' => ['required'],
            'fecha_inicio' => ['bail', 'required', 'after_or_equal:today'],
            'fecha_fin' => ['required', 'after_or_equal:' . $fecha_inicio, 'before_or_equal:2050-12-31'],
            'lugares_id' => ['required', 'exists:lugares,id'],
        ]);

        Evento::create($request->all());

        return redirect()->route('evento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        $lugar = Lugar::where('id', $evento->lugares_id)->first();

        return view('eventos.show', compact('evento', 'lugar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        $lugares = Lugar::all();

        $fecha_inicio_sql = $evento->fecha_inicio;
        $fecha_fin_sql = $evento->fecha_fin;

        $fecha_inicio = Carbon::createFromFormat('Y-m-d H:i:s', $fecha_inicio_sql)->format('Y-m-d');
        $fecha_fin = Carbon::createFromFormat('Y-m-d H:i:s', $fecha_fin_sql)->format('Y-m-d');

        return view('eventos.edit', compact('evento', 'lugares', 'fecha_inicio', 'fecha_fin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        $fecha_inicio = $request->input('fecha_inicio');

        $request->validate([
            'nombre' => ['required', 'max:255'],
            'descripcion' => ['required'],
            'fecha_inicio' => ['bail', 'required', 'after_or_equal:today'],
            'fecha_fin' => ['required', 'after_or_equal:' . $fecha_inicio, 'before_or_equal:2050-12-31'],
            'lugares_id' => ['required', 'exists:lugares,id'],
        ]);

        $evento->update($request->except('_token', '_method'));

        return redirect()->route('evento.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->route('evento.index');
    }
}
