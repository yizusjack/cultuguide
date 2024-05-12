<?php

namespace App\Livewire\Listados;

use App\Models\Evento;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class EventoTable extends DataTableComponent
{
    protected $model = Evento::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->deselected(),
            LinkColumn::make('Nombre', 'nombre')
                ->title(fn($row) => $row->nombre)
                ->location(fn($row) => route('evento.show', $row->id)),
            Column::make("Name", "nombre")
                ->sortable()
                ->deselected(),
            Column::make("Descripcion", "descripcion")
                ->sortable()
                ->collapseAlways(),
            DateColumn::make("Inicio", "fecha_inicio")
                ->inputFormat('Y-m-d H:i:s')
                ->outputFormat('d/m/Y H:i')
                ->sortable(),
            DateColumn::make("Fin", "fecha_fin")
                ->inputFormat('Y-m-d H:i:s')
                ->outputFormat('d/m/Y H:i')
                ->sortable(),
            Column::make("Lugar", "lugares.nombre")
                ->eagerLoadRelations()
                ->sortable(),
            Column::make("Acciones")
                ->label(
                    function($row){
                        $id = $row->id;
                        return view('livewire.acciones.acciones-evento', compact('id'));
                    }
                )
                ->html(),
        ];
    }
}
