<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DailyProjectStatusNotification extends Notification
{
    protected $projects;

    // Recibe los proyectos con estado "Sin cambiar"
    public function __construct($projects)
    {
        $this->projects = $projects;
    }

    // El método toMail permite definir el mensaje de la notificación
    public function toMail($notifiable)
    {
        $mailMessage = (new MailMessage)
            ->subject('Estado de los proyectos - Notificación diaria')
            ->greeting('¡Hola!');

        if ($this->projects->isEmpty()) {
            $mailMessage->line('No tienes proyectos con estado "Sin cambiar".');
        } else {
            $mailMessage->line('Tienes los siguientes proyectos con estado "Sin cambiar":');
            foreach ($this->projects as $project) {
                $mailMessage->line("Proyecto: {$project->name}");
            }
        }

        $mailMessage->line('Este es un recordatorio para que revises tus proyectos.');

        return $mailMessage;
    }

    public function via($notifiable)
    {
        return ['mail'];  // Enviar la notificación por correo electrónico
    }
}
