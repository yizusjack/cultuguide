<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\Lugar;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd("Give me something to believe in this HYCAD");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
