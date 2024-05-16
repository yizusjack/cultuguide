<?php

namespace App\Livewire\Acciones;

use App\Models\Dato;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddDatos extends Component
{
    public $display;
    public $ciudades;
    public $presupuestos;

    public $fecha_n;
    public $ciudad;
    public $presupuesto;


    protected $rules = [
        'fecha_n' => 'required|date',
        'ciudad' => 'required',
        'presupuesto' => 'required'
    ];
    
    public function mount()
    {
        $this->display = Auth::user()->datos_id == null ? true : false;

        $this->ciudades = collect([
            [
                'id' => 'Guadalajara',
                'value' => 'Guadalajara'
            ],
            [
                'id' => 'Tlaquepaque',
                'value' => 'Tlaquepaque'
            ],
            [
                'id' => 'Tonala',
                'value' => 'Tonalá'
            ],
            [
                'id' => 'Zapopana',
                'value' => 'Zapopan'
            ],
            [
                'id' => 'Tlajomulco',
                'value' => 'Tlajomulco'
            ],
            [
                'id' => 'Foraneo',
                'value' => 'Foráneo'
            ],
        ]);

        $this->presupuestos = collect([
            [
                'id' => '0-30',
                'value' => '0 a 30 pesos'
            ],
            [
                'id' => '30-60',
                'value' => '30 a 60 pesos'
            ],
            [
                'id' => '60-90',
                'value' => '60 a 90 pesos'
            ],
            [
                'id' => '90+',
                'value' => '90 pesos o más'
            ],
        ]);

    }

    public function save()
    {
        $this->validate();
        
        $dato = New Dato();
        $dato->fecha_n = $this->fecha_n;
        $dato->ciudad = $this->ciudad;
        $dato->presupuesto = $this->presupuesto;

        $dato->save();

        $user = Auth::user();
        $user->datos_id = $dato->id;
        $user->save();

        $this->display = false;
    }
    
    public function render()
    {
        return view('livewire.acciones.add-datos');
    }
}
