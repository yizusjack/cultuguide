<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lugar;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LugarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd("Suena la alarma, seré furiosa");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $municipios = Municipio::all();

        return view('lugares.create', compact('municipios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
            'descripcion' => ['required'],
            'latitud' => ['required', 'min:-90', 'max:90', 'decimal:0,6'],
            'longitud' => ['required', 'min:-180', 'max:180', 'decimal:0,6'],
            'direccion' => ['required'],
            'municipios_id' => ['required', 'exists:municipios,id'],
        ]);

        Lugar::create($request->all());

        return redirect()->route('lugar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lugar $lugar)
    {
        return view('lugares.show', compact('lugar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lugar $lugar)
    {
        $municipios = Municipio::all();

        return view('lugares.edit', compact('lugar', 'municipios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lugar $lugar)
    {
        $request->validate([
            'nombre' => ['required', 'max:255'],
            'descripcion' => ['required'],
            'latitud' => ['required', 'min:-90', 'max:90', 'decimal:0,6'],
            'longitud' => ['required', 'min:-180', 'max:180', 'decimal:0,6'],
            'direccion' => ['required'],
            'municipios_id' => ['required', 'exists:municipios,id'],
        ]);
        
        $lugar->update($request->except('_token', '_method'));
        
        return redirect()->route('lugar.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lugar $lugar)
    {
        $lugar->delete();

        return redirect()->route('lugar.index');
    }
}
