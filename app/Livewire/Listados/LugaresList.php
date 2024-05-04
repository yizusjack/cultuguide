<?php

namespace App\Livewire\Listados;

use App\Models\Lugar;
use Livewire\Component;
use App\Models\Municipio;
use Livewire\WithPagination;

class LugaresList extends Component
{
    use WithPagination;


    public string $nombreLugar="";
    public $municipio;


    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $municipios = Municipio::all();
        $lugares = Lugar::query()
        ->when($this->nombreLugar, function($query){
            $query->where('nombre', 'like', '%' . $this->nombreLugar . '%');
        })
        ->when($this->municipio, function($query){
            $query->where('municipios_id', $this->municipio);
        })
        ->with('imagenes')
        ->paginate(6);

        $this->resetPage();

        return view('livewire.listados.lugares-list', compact('lugares', 'municipios'));
    }
}
