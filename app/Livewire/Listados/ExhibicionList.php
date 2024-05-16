<?php

namespace App\Livewire\Listados;

use App\Models\Exhibicion;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class ExhibicionList extends DataTableComponent
{
    protected $model = Exhibicion::class;

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
            Column::make("Name", "nombre")
                ->searchable()
                ->deselected()
                ->sortable(),
            LinkColumn::make('Nombre', 'nombre')
                ->title(fn($row) => $row->nombre)
                ->location(fn($row) => route('evento.show', $row->id)),
            Column::make("Descripcion", "descripcion")
                ->searchable()
                ->collapseAlways()
                ->sortable(),
            Column::make("Lugar", "lugares.nombre")
                ->eagerLoadRelations()
                ->searchable()
                ->sortable(),
        ];
    }
}
