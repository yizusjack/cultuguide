<?php

namespace App\Livewire\Listados;

use App\Models\Lugar;
use Livewire\Component;
use App\Models\Municipio;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class LugaresList extends Component
{
    use WithPagination;


    public string $nombreLugar="";
    public $municipio;

    public $recomendaciones;


    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->recomendaciones = false;
    }

    public function cambiar()
    {
        $this->recomendaciones = ! $this->recomendaciones;
        $this->render();
    }

    /*#[On('datos')] 
    public function getRecomendaciones()
    {
        Auth::user()->datos_id == null ? false : true;
    }*/
    
    #[On('datos')]
    public function render()
    {
        $municipios = Municipio::all();

        //$this->recomendaciones = true;
        if ($this->recomendaciones == false)
        {
            $lugares = Lugar::query()
            ->when($this->nombreLugar, function($query){
                $query->where('nombre', 'like', '%' . $this->nombreLugar . '%');
            })
            ->when($this->municipio, function($query){
                $query->where('municipios_id', $this->municipio);
            })
            ->with('imagenes')
            ->paginate(6);
        } else
        {
            $tag = "";

            switch(Auth::user()->datos->ciudad)
            {
                case 'Guadalajara':
                    $tag = 'Arte';
                break;

                case 'Tonala':
                    $tag = 'Ciencias';
                break;

                case 'Tlaquepaque':
                    $tag = 'Ciencias';
                break;

                case 'Zapopan':
                    $tag = 'Historia';
                break;

                case 'Tlajomulco':
                    $tag = 'Ciencias';
                break;

                case 'Foraneo':
                    $tag = 'Cultura';
                break;

                default:
                    $tag = 'Cultura';
            }

            $lugares = Lugar::query()
            ->when($this->nombreLugar, function($query){
                $query->where('nombre', 'like', '%' . $this->nombreLugar . '%');
            })
            ->when($this->municipio, function($query){
                $query->where('municipios_id', $this->municipio);
            })
            ->where('tag', $tag)
            ->with('imagenes')
            ->paginate(6);
        }

        $this->resetPage();

        return view('livewire.listados.lugares-list', compact('lugares', 'municipios'));
    }
}
