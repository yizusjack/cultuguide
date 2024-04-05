<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Exhibicion;
use Illuminate\Http\Request;

class ExhibicionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lugares = Lugar::all();
        
        return view('exhibiciones.create', compact('lugares'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
            'descripcion' => ['required'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['nullable', 'date'],
            'lugares_id' => ['required', 'exists:lugares,id'],
        ]);

        Exhibicion::create($request->all());

        return redirect()->route('lugar.show', $request->lugares_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exhibicion $exhibicion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exhibicion $exhibicion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exhibicion $exhibicion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exhibicion $exhibicion)
    {
        //
    }
}
