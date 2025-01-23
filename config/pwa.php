<?php

return [
    'name' => 'Notificaciones',                  // Nombre de la aplicación
    'short_name' => 'LaravelApp',                 // Nombre corto que aparece en la pantalla de inicio
    'theme_color' => '#1565C',                   // Color del tema para la barra de estado
    'background_color' => '#ffffff',              // Color de fondo de la pantalla de inicio
    'start_url' => '/',                           // URL de inicio de la PWA
    'display' => 'standalone',                    // Modo de visualización, puede ser 'fullscreen', 'standalone', 'minimal-ui'
    'icons' => [
        [
            "src" =>  "/favicon-not.ico",
            'sizes' => '75x75',
            'type' => 'image/ico',
        ],
    ],
    'service_worker' => true,
];

