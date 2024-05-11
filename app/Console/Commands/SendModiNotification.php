<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Console\Command;

class SendModiNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:review-information';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera una notificación para los administradores del sistema sobre revisar la información.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::role('admin')->get();

        Notification::where('titulo', 'Recordatorio')->delete();

        foreach ($users as $user)
        {
            $notification = new Notification();
            $notification->titulo = 'Recordatorio';
            $notification->contenido = 'Revisa que todas la información esté actualizada. Revisa las reclamaciones.';
            $notification->user_id = $user->id;
            $notification->icon = "exclamation-diamond-fill";
            $notification->color = "warning";
            $notification->redirect_to = "reclamo.index";

            $notification->save();
        }

        echo("Notificaciones enviadas con exito!");
    }
}
