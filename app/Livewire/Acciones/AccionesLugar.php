<?php

namespace App\Livewire\Acciones;

use App\Models\Lugar;
use Livewire\Component;

class AccionesLugar extends Component
{
    public $display=false;
    
    public $lugar;

    public function mount(Lugar $lugar)
    {
        $this->lugar = $lugar;
    }
    
    public function render()
    {
        return view('livewire.acciones.acciones-lugar');
    }
}
