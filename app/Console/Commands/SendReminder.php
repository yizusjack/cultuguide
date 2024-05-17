<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Evento;
use App\Models\Notification;
use Illuminate\Console\Command;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:sendReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia un recordatorio a los usuarios que tienen eventos pendientes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $eventos = Evento::whereDate('fecha_inicio', Carbon::tomorrow())->get();

        foreach ($eventos as $evento)
        {
           foreach ($evento->users as $user)
           {
                $notification = new Notification();
                $notification->titulo = 'This a reminder';
                $notification->contenido = 'Tienes un evento mañana.';
                $notification->user_id = $user->id;
                $notification->icon = "exclamation-diamond-fill";
                $notification->color = "warning";
                $notification->redirect_to = "evento.show";
                $notification->redirect_parameter = $evento->id;

                $notification->save();
           } 
        }

        echo('This a reminder');
    }
}
