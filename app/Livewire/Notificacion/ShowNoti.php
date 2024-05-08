<?php

namespace App\Livewire\Notificacion;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class ShowNoti extends Component
{
    public $unreaded;
    public $notifications;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->unreaded = Notification::whereBelongsTo($this->user)->where('readed_at', null)->count();
        $this->notifications = Notification::whereBelongsTo($this->user)->orderBy('id', 'desc')->limit(4)->get();
    }
    
    public function render()
    {
        return view('livewire.notificacion.show-noti');
    }
}
