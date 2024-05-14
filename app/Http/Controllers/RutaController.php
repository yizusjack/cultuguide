<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use App\Models\Lugar;
use Illuminate\Http\Request;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rutas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rutas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ruta_antigua' => ['required', 'max:255'],
            'ruta_actual' => ['required', 'max:255'],
        ]);

        Ruta::create($request->all());

        return redirect()->route('rutas.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruta $ruta)
    {
        return view('rutas.edit', compact('ruta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruta $ruta)
    {
        $request->validate([
            'ruta_antigua' => ['required', 'max:255'],
            'ruta_actual' => ['required', 'max:255'],
        ]);

        $ruta->update($request->all());

        return redirect()->route('rutas.index');
    }

    public function destroy(Ruta $ruta)
    {
        $ruta->delete();
        return redirect()->route('rutas.index');
    }

    public function asignar(Request $request, Lugar $lugar)
    {
        $lugar->rutas()->sync($request->ruta_id);

        return redirect()->route('lugar.show', $lugar);
    }
}
    