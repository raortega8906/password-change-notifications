<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Sistema de Notificaciones de Contraseña') }}</title>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('./favicon-not.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('./favicon-not.svg') }}">
    @vite('resources/css/app.css')
    <style>
        .bg-primary { background-color: #17630e; }
        .text-primary { color: #17630e; }
        .hover\:text-primary-light:hover { color: #fff; }
    </style>
</head>
<body class="antialiased bg-gray-100">
    <header class="bg-primary text-white">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="font-bold text-xl">
                        {{ config('app.name', 'Sistema de Notificaciones') }}
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="https://github.com/raortega8906/password-change-notifications" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:text-primary-light">{{ __('Dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium hover:text-primary-light">{{ __('Iniciar sesión') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-medium hover:text-primary-light">{{ __('Registrarse') }}</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <div class="min-h-screen flex flex-col justify-center items-center py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-primary mb-4">{{ __('Sistema de Notificaciones de Contraseña') }}</h1>
                <p class="text-xl text-gray-600">{{ __('Gestiona tus proyectos y mantén tus contraseñas actualizadas') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <h2 class="ml-4 text-2xl font-semibold text-gray-800">{{ __('Gestión de Contraseñas') }}</h2>
                        </div>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>{{ __('Cada proyecto tiene un estado de contraseña (Sin cambiar o Cambiada).') }}</li>
                            <li>{{ __('El estado se reinicia automáticamente a "Sin cambiar" cada 3 meses.') }}</li>
                            <li>{{ __('Los usuarios pueden actualizar el estado a "Cambiada" en su panel de control.') }}</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                            <h2 class="ml-4 text-2xl font-semibold text-gray-800">{{ __('Sistema de Notificaciones') }}</h2>
                        </div>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>{{ __('Notificaciones generadas automáticamente para proyectos con estado "Sin cambiar".') }}</li>
                            <li>{{ __('Enviadas diariamente hasta que todos los proyectos estén marcados como "Cambiada".') }}</li>
                            <li>{{ __('Los usuarios reciben notificaciones sobre los proyectos que necesitan actualización.') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        <h2 class="ml-4 text-2xl font-semibold text-gray-800">{{ __('Características del Sistema') }}</h2>
                    </div>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>{{ __('Los usuarios se autentican para acceder al sistema.') }}</li>
                        <li>{{ __('Cada usuario tiene una lista de proyectos asignados.') }}</li>
                        <li>{{ __('Panel de control para ver y gestionar los estados de las contraseñas.') }}</li>
                        <li>{{ __('Automatización mediante cron jobs para actualizar estados y enviar notificaciones.') }}</li> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <footer class="mt-20 py-6 bg-white shadow-md">
        <div class="container mx-auto px-6 flex justify-center items-center">
            <p class="text-sm text-[#17630e]">&copy; {{ date('Y') }} {{ __('Desarrollado por') }}
                <a class="hover:underline" href="https://portfolio.wpcache.es" target="_blank">{{ __('Rafael A. Ortega') }}</a>.
            </p>
        </div>
    </footer>
    <script>
        alert('Para probar el sistema, por favor, inicia sesión con el usuario "admin@admin.com" y la contraseña "admin".');

        self.addEventListener('activate', (event) => {
            event.waitUntil(
                caches.keys().then((cacheNames) => {
                    return Promise.all(
                        cacheNames.map((cacheName) => caches.delete(cacheName))
                    );
                })
            );
        });
    </script>
</body>
</html>
