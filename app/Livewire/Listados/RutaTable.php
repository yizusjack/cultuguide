<?php

namespace App\Livewire\Listados;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Ruta;

class RutaTable extends DataTableComponent
{
    protected $model = Ruta::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->hideIf(1==1),
            Column::make("Ruta antigua", "ruta_antigua")
                ->sortable()
                ->searchable(),
            Column::make("Ruta actual", "ruta_actual")
                ->sortable()
                ->searchable(),
        ];
    }
}
