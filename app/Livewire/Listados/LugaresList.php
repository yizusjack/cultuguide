<?php

namespace App\Livewire\Listados;

use App\Models\Lugar;
use Livewire\Component;

class LugaresList extends Component
{
    public $lugares;

    public function mount()
    {
        $this->lugares = Lugar::with('imagenes')->get();
    }
    
    public function render()
    {
        return view('livewire.listados.lugares-list');
    }
}
