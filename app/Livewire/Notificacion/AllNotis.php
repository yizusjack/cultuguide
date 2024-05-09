<?php

namespace App\Livewire\Notificacion;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class AllNotis extends Component
{
    public $unreaded;
    public $notifications;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->showNotis();
    }

    public function goToNoti(Notification $notification)
    {
        if($notification->readed_at == null)
        {
            $notification->readed_at = Carbon::now();
            $notification->save();
        }
        
        return redirect()->route($notification->redirect_to, $notification->redirect_parameter);
    }

    #[On('list')]
    public function showNotis()
    {
        $this->unreaded = Notification::whereBelongsTo($this->user)->where('readed_at', null)->count();
        $this->notifications = Notification::whereBelongsTo($this->user)->orderBy('id', 'desc')->get();
    }
    
    #[On('list')]
    public function render()
    {
        return view('livewire.notificacion.all-notis');
    }
}
