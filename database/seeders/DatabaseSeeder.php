<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Rafael A. Ortega',
            'email' => 'raortega8906@gmail.com',
            'password' => Hash::make('laravel2024.'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'is_admin' => true,
        ]);

        // User::factory(10)->create();
        // Project::factory(10)->create();

        // Creamos los usuarios
        $users = [
            'Ernesto',
            'Linda',
            'Maria Alvarez',
            'Maria Castillo',
            'Victor',
            'Mar Garcia',
            'Javier',
        ];

        foreach ($users as $name) {
            $name_modified = str_replace(' ', '', $name);
            $name_modified = strtolower($name);
            User::create([
                'name' => $name,
                'email' => $name_modified . '@test.test',
                'password' => Hash::make('test'),
            ]);
        }

        // Obtenemos todos los usuarios creados
        $allUsers = User::all();

        // Creamos los proyectos, asignando un usuario aleatorio a cada uno
        $proyectos = [
            'Código Media',
            'Tena España - Centrada en ti',
            'Tena Italia - Dedicato a me',
            'Landing - Ultima menopausa da sola',
            'Tena Grecia - Syn seola',
            'Tena Portugal - Centrada em si',
            'Ford - The SUV Master',
            'Ford - Club Privilegio',
            'Ford - Sales Pro Talent',
            'Ibermedia - Programa Ibermedia',
            'Ibermedia - Ibermedia Digital',
            'Fitecbot',
            'Eurologística',
            'Vintage Ibiza',
            'Fundación Real Madrid',
            'Amaya Sangil',
            'Jesús nos cuenta',
            'Revista Me & My Mazda',
            'Virtual Vendor Video',
            'Lambda 3'
        ];

        foreach ($proyectos as $proyecto) {
            Project::create([
                'name' => $proyecto,
                'status' => 'Sin cambiar',
                'user_id' => $allUsers->random()->id,
            ]);
        }
    }
}
