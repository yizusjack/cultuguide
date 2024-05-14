<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Reclamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reclamos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Lugar $lugar)
    {
        $request['lugares_id'] = $lugar->id;
        $request['users_id'] = Auth::user()->id;

        Reclamo::create($request->all());

        return redirect()->route('lugar.show', $lugar);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reclamo $reclamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reclamo $reclamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reclamo $reclamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reclamo $reclamo)
    {
        //
    }
}
