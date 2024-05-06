<?php

namespace App\Livewire\Listados;

use App\Models\Lugar;
use Livewire\Component;
use App\Models\Exhibicion;
use Livewire\WithPagination;

class ExhibicionesList extends Component
{
    use WithPagination;
    
    public $lugar;

    public $nombreExhibicion;

    protected $paginationTheme = 'bootstrap';

    public function mount(Lugar $lugar)
    {
        $this->lugar = $lugar;
    }
    
    public function render()
    {
        $exhibiciones = Exhibicion::whereBelongsTo($this->lugar, 'lugares')
        ->where('nombre', 'like', '%' . $this->nombreExhibicion . '%')
        ->with('imagenes')
        ->paginate(6);

        $this->resetPage();

        return view('livewire.listados.exhibiciones-list', compact('exhibiciones'));
    }
}
