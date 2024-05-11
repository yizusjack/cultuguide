<?php

namespace App\Livewire\Notificacion;

use App\Models\User;
use App\Models\Evento;
use Livewire\Component;
use App\Models\Notification;

class Crear extends Component
{
    public $evento;

    public function mount(Evento $evento)
    {
        $this->evento = $evento;
    }

    public function notificar(int $user)
    {

        $notification = new Notification;
        
        if ( $this->evento->users()->where('user_id', $user)->count() == 0)
        {
            $this->evento->users()->attach($user);
            $notification->titulo = 'Nuevo evento';
            $notification->contenido = 'Te acabas de enlistar al evento ' . $this->evento->nombre . '!';
            $notification->icon = "bookmark-plus-fill";
            $notification->color = "success";
        } else
        {
            $this->evento->users()->detach($user);
            $notification->titulo = 'Cancelaste el evento';
            $notification->contenido = 'Te acabas de dar de baja de ' . $this->evento->nombre . ' :(';
            $notification->icon = "bookmark-x-fill";
            $notification->color = "danger";
        }

        
        
        $notification->user_id = $user;
        $notification->redirect_parameter = $this->evento->id;
        $notification->redirect_to = "evento.show";

        $notification->save();

        $this->dispatch('list')->to('Notificacion.ShowNoti');
        $this->dispatch('list')->to('Notificacion.AllNotis');

    }
    
    public function render()
    {
        return view('livewire.notificacion.crear');
    }
}
