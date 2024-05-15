<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ruta;
use App\Models\User;
use App\Models\Costo;
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
        return view('lugares.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $municipios = Municipio::all();

        $categorias = collect([
            [
                'id' => 'Cultura',
                'value' => 'Cultura'
            ],
            [
                'id' => 'Arte',
                'value' => 'Arte'
            ],
            [
                'id' => 'Ciencias',
                'value' => 'Ciencias'
            ],
            [
                'id' => 'Historia',
                'value' => 'Historia'
            ],
        ]);

        return view('lugares.create', compact('municipios', 'categorias'));
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
            'horario_apertura' => ['required', 'date_format:H:i'],
            'horario_cierre' => ['required', 'date_format:H:i', 'after:horario_apertura'],
            'tag' => ['required'],
        ]);

        Lugar::create($request->all());

        return redirect()->route('lugar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lugar $lugar)
    {

        $pictures = $lugar->imagenes;

        $costos = Costo::whereBelongsTo($lugar)->get();

        $horaAp = Carbon::parse($lugar->horario_apertura)->format('h:i A');

        $horaCie = Carbon::parse($lugar->horario_cierre)->format('h:i A');
        
        $costosMercado = Costo::whereBelongsTo($lugar)->where('costo', '>', 0)->get();

        $rutas = Ruta::all();

        
        return view('lugares.show', compact('lugar', 'pictures', 'costos', 'costosMercado', 'horaAp', 'horaCie', 'rutas'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lugar $lugar)
    {
        $municipios = Municipio::all();

        $categorias = collect([
            [
                'id' => 'Cultura',
                'value' => 'Cultura'
            ],
            [
                'id' => 'Arte',
                'value' => 'Arte'
            ],
            [
                'id' => 'Ciencias',
                'value' => 'Ciencias'
            ],
            [
                'id' => 'Historia',
                'value' => 'Historia'
            ],
        ]);

        return view('lugares.edit', compact('lugar', 'municipios', 'categorias'));
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
            'horario_apertura' => ['required', 'date_format:H:i'],
            'horario_cierre' => ['required', 'date_format:H:i', 'after:horario_apertura'],
            'tag' => ['required'],
        ]);
        
        $lugar->update($request->except('_token', '_method'));
        
        return redirect()->route('lugar.show', $lugar);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lugar $lugar)
    {
        
        $lugar->delete();

        return redirect()->route('lugar.index');

        //FALTA ELIMINAR IMAGENES LIGADAS
    }
}
