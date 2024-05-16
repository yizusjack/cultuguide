<?php

namespace App\Livewire\Listados;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Costo;

class CostoList extends DataTableComponent
{
    protected $model = Costo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->deselected()
                ->sortable(),
            Column::make("Categoria", "categoria")
                ->sortable(),
            Column::make("Costo", "costo")
                ->sortable(),
            Column::make("Lugar", "lugar.nombre")
                ->searchable()
                ->sortable(),
            Column::make("Acciones")
                ->label(
                    function($row){
                        $id = $row->id;
                        return view('livewire.acciones.acciones-costo', compact('id'));
                    }
                )
                ->html(),

        ];
    }
}
