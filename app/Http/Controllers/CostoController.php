<?php

namespace App\Http\Controllers;

use App\Models\Costo;
use Illuminate\Http\Request;

class CostoController extends Controller
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
        $categorias = collect([
            ['value' => 'Estudiante'],
            ['value' => 'Infante'],
            ['value' => 'Adulto mayor'],
            ['value' => 'Residente del estado de Jalisco'],
            ['value' => 'Turista'],
        ]);
        return view('costo.create', compact('categorias'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required',
            'costo' => 'required|numeric',
            'lugares_id' => 'required|exists:lugares,id',
        ]);
        Costo::create($request->all());
        return redirect()->route('costos.index')->with('success', 'Costo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Costo $costo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Costo $costo)
    {
        $categorias = collect([
            ['value' => 'Estudiante'],
            ['value' => 'Infante'],
            ['value' => 'Adulto mayor'],
            ['value' => 'Residente del estado de Jalisco'],
            ['value' => 'Turista'],
        ]);
        return view('costo.edit', compact('costo', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Costo $costo)
    {
        $request->validate([
            'categoria' => 'required',
            'costo' => 'required|numeric',
            'lugares_id' => 'required|exists:lugares,id',
        ]);
        $costo->update($request->all());
        return redirect()->route('costos.index')->with('success', 'Costo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Costo $costo)
    {
        $costo->delete();
        return redirect()->route('costos.index')->with('success', 'Costo eliminado correctamente.');
    }
}
