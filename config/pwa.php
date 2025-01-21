<?php

return [
    'name' => 'Mi Aplicación Laravel',            // Nombre de la PWA
    'short_name' => 'LaravelApp',                 // Nombre corto que aparece en la pantalla de inicio
    'theme_color' => '#000000',                   // Color del tema para la barra de estado
    'background_color' => '#ffffff',              // Color de fondo de la pantalla de inicio
    'start_url' => '/',                           // URL de inicio de la PWA
    'display' => 'standalone',                    // Modo de visualización, puede ser 'fullscreen', 'standalone', 'minimal-ui'
    'icons' => [                                  // Iconos para la PWA
        [
            'src' => '/images/icons/icon-192x192.png',
            'sizes' => '192x192',
            'type' => 'image/png',
        ],
        [
            'src' => '/images/icons/icon-512x512.png',
            'sizes' => '512x512',
            'type' => 'image/png',
        ],
    ],
    'service_worker' => true,
];

