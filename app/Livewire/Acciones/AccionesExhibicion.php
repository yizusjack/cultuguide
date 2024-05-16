<?php

namespace App\Livewire\Acciones;

use Livewire\Component;
use App\Models\Exhibicion;

class AccionesExhibicion extends Component
{
    public $display=false;
    
    public $exhibicion;
    
    public function mount(Exhibicion $exhibicion)
    {
        $this->exhibicion = $exhibicion;
    }
    
    public function render()
    {
        return view('livewire.acciones.acciones-exhibicion');
    }
}
