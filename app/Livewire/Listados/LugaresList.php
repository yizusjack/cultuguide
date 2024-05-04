<?php

namespace App\Livewire\Listados;

use App\Models\Lugar;
use Livewire\Component;
use Livewire\WithPagination;

class LugaresList extends Component
{
    use WithPagination;


    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        
    }
    
    public function render()
    {
        return view('livewire.listados.lugares-list', ['lugares' => Lugar::with('imagenes')->paginate(3),]);
    }
}
