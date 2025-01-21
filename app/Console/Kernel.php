<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Lógica para enviar las notificaciones
            $projects = \App\Models\Project::where('status', 'Sin cambiar')->get();
            
            if ($projects->isNotEmpty()) {
                // Aquí puedes definir a quién enviar las notificaciones
                $notifiableUsers = \App\Models\User::all(); // Cambia según tus necesidades

                foreach ($notifiableUsers as $user) {
                    $user->notify(new \App\Notifications\DailyProjectStatusNotification($projects));
                }
            }
        })->hourly(); // Ejecutar cada hora
        //   ->when(function () {
        //       $month = now()->month; // Mes actual
        //       return in_array($month, [1, 4, 7, 10]); // Solo en enero, abril, julio y octubre
        //   });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
