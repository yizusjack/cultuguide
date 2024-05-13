<?php

namespace App\Livewire\Listados;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserList extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setTdAttributes(function(Column $column, $row, $columnIndex, $rowIndex) {
            if ($column->getTitle() === "Verificado") {
                return [
                    'class' => 'text-left',
                ];
            }

            return [];
        });

        $this->setThAttributes(function(Column $column) {
            if ($column->isField('email_verified_at')) {
              return [
                'class' => 'text-center',
              ];
            }
         
            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->deselected(),
            Column::make("Nombre", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Verificado", "email_verified_at")
                ->format(function ($value, $row, Column $column) {
                    if ($value != null) {
                        return "<i class='bi bi-patch-check-fill text-primary'></i>";
                    } else {
                        return "<i class='bi bi-person-x-fill text-danger'></i>";
                    }
                })
                ->html()
                ->sortable(),
            Column::make("Cambiar permisos")
                ->label(
                    function($row){
                        $id = $row;
                        return view('livewire.acciones.cambiar-permisos', compact('id'));
                    }
                )
                ->html(),
        ];
    }
}
