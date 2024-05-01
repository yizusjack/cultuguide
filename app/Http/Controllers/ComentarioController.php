<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'=>['required', 'max:255'],
            'rating'=>['required', 'min:1', 'max:10']
        ]);

        Comentario::create([
            'content'=>$request->content,
            'user_id'=>auth()->user()->id,
            'lugares_id'=>$request->lugares_id,
            'rating'=>$request->rating,
        ]);

        return back()->with('success', 'Comentario agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $comment = Comentario::find($comentario->id);

        if ($comment) {
            $comment->delete();
        }
        return back()->with('success', 'Comentario eliminado exitosamente.');
    }
}
