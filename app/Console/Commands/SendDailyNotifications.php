<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Notifications\DailyProjectStatusNotification;

class SendDailyNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-daily-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily notifications to users with projects marked as "Sin cambiar".';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all users with at least one project with status "Sin cambiar"
        $users = User::whereHas('projects', function ($query) {
            $query->where('status', 'Sin cambiar');
        })->get();

        foreach ($users as $user) {
            $projects = $user->projects()->where('status', 'Sin cambiar')->get();

            // Notify the user
            $user->notify(new DailyProjectStatusNotification($projects));
        }

        $this->info('Daily notifications sent successfully.');
    }
}
