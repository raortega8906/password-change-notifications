<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function exportarCsvNotificaciones()
    {
        // Obtener los usuarios con proyectos cuyo estado sea "Sin cambiar"
        $users = User::with(['projects' => function ($query) {
            $query->where('status', 'Sin cambiar');
        }])->whereHas('projects', function ($query) {
            $query->where('status', 'Sin cambiar');
        })->get();

        // Generar el contenido del CSV
        $csvHeader = ['Usuario ID', 'Nombre Usuario', 'Proyecto ID', 'Nombre Proyecto', 'Estado'];
        $csvContent = [$csvHeader];

        foreach ($users as $user) {
            foreach ($user->projects as $project) {
                $csvContent[] = [
                    $user->id,
                    $user->name,
                    $project->id,
                    $project->name,
                    $project->status,
                ];
            }
        }

        // Convertir a CSV
        $filename = 'notificaciones_proyectos.csv';
        $filepath = storage_path('app/' . $filename);
        $file = fopen($filepath, 'w');

        foreach ($csvContent as $row) {
            fputcsv($file, $row);
        }

        fclose($file);

        // Descargar el archivo
        return response()->download($filepath)->deleteFileAfterSend(true);
    }
}
