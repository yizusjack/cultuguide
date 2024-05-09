<?php

namespace App\Livewire\Notificacion;

use App\Models\User;
use Livewire\Component;
use App\Models\Notification;

class Crear extends Component
{
    public function notificar(int $user)
    {
        $notification = new Notification;
        $notification->titulo = 'Nuevo evento';
        $notification->contenido = 'Te acabas de enlistar a un evento!';
        $notification->user_id = $user;
        $notification->icon = "bookmark-plus-fill";
        $notification->color = "success";
        $notification->redirect_to = "evento.index";

        $notification->save();

        $this->dispatch('list')->to('Notificacion.ShowNoti');

    }
    
    public function render()
    {
        return view('livewire.notificacion.crear');
    }
}
