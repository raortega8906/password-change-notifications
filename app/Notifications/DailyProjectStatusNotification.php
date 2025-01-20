<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DailyProjectStatusNotification extends Notification
{
    use Queueable;

    protected $projects;

    /**
     * Create a new notification instance.
     */
    public function __construct($projects)
    {
        $this->projects = $projects;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Proyectos pendientes de actualización')
            ->line('Estos son los proyectos que aún tienen el estado "Sin cambiar":');

        foreach ($this->projects as $project) {
            $mailMessage->line("- {$project->name}");
        }

        $mailMessage->line('Por favor, actualiza los estados lo antes posible.');

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
