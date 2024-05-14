<?php

namespace App\Livewire\Listados;

use App\Models\Reclamo;
use App\Models\Notification;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ReclamoTable extends DataTableComponent
{
    protected $model = Reclamo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function leer($reclamo)
    {
        $reclamo = Reclamo::findOrFail($reclamo);

        $reclamo->issued = true;
        $reclamo->save();

        $this->sendNoti($reclamo);
    }

    public function sendNoti(Reclamo $reclamo)
    {
        $notification = new Notification;
        $notification->titulo = 'Reclamo visto';
        $notification->contenido = 'Su reclamo correpondiente a ' . $reclamo->lugares->nombre . ' ha sido analizado por nuestros administradores';
        $notification->icon = "check2-all";
        $notification->color = "success";
        $notification->user_id = $reclamo->users_id;
        $notification->redirect_parameter = $reclamo->lugares_id;
        $notification->redirect_to = "lugar.show";
        $notification->save();

        $this->dispatch('list')->to('Notificacion.ShowNoti');
        $this->dispatch('list')->to('Notificacion.AllNotis');

        $reclamo->delete();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->deselected(),
            Column::make("Reclamo", "contenido")
                ->sortable(),
            Column::make("Usuario", "users.name")
                ->eagerLoadRelations()
                ->collapseAlways()
                ->searchable()
                ->sortable(),
            Column::make("Lugar", "lugares.nombre")
                ->eagerLoadRelations()
                ->searchable()
                ->sortable(),
            Column::make("Issued", "issued")
                ->sortable()
                ->deselected(),
            Column::make("Tratado")
                ->label(
                    function($row){
                        if($row->issued == false)
                        {
                            $reclamo = $row->id;
                            return view('livewire.acciones.acciones-reclamo', compact('reclamo'));
                        }
                    }
                )
                ->html(),
        ];
    }
}
