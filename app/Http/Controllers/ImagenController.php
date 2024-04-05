<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ImagenController extends Controller
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
        
        if($request->imageable_type)
        {
            $tabla = '';
            switch($request->imageable_type)
            {
                case 'App\Models\Lugar':
                    $tabla = 'lugares';
                break;

                default:
                    throw new Exception('La tabla no existe');
                break;

            }
            
            $request->validate([
                'imageable_id' => ['required', 'exists:'.$tabla.',id',],
                'imageable_type' => ['required', Rule::in(['App\Models\Lugar'])],
            ]);
        
            $route = $request->file->store('public');
            $pictures = new Imagen();
            $pictures->hash = $route;
            $pictures->nombre = $request->file->getClientOriginalName();
            $pictures->extension = $request->file->guessExtension();
            $pictures->mime = $request->file->getMimeType();
            $pictures->imageable_id = $request->imageable_id;
            $pictures->imageable_type = $request->imageable_type;
            $pictures->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Imagen $imagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagen $imagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagen $imagen)
    {
        //
    }
}
