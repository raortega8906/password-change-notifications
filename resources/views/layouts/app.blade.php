<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panel de Notificaciones')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#F5F5F5]">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-[#1565C0] text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <a href="#" class="text-white flex items-center space-x-2 px-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span class="text-2xl font-extrabold">Notificaciones</span>
            </a>
            <nav>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-[#B3E5FC] hover:text-[#1565C0]">
                    Dashboard
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-[#B3E5FC] hover:text-[#1565C0]">
                    Proyectos
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-[#B3E5FC] hover:text-[#1565C0]">
                    Usuarios
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-[#B3E5FC] hover:text-[#1565C0]">
                    Configuración
                </a>
            </nav>
        </div>

        <!-- Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top bar -->
            <header class="bg-[#FFFFFF] shadow-md">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-[#1565C0]">@yield('header', 'Panel de Control')</h1>
                    <div class="flex items-center">
                        <button class="relative p-2 text-[#1565C0] hover:text-[#B3E5FC] focus:outline-none focus:ring-2 focus:ring-[#1565C0]">
                            <span class="sr-only">Ver notificaciones</span>
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400 ring-2 ring-white"></span>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#F5F5F5]">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>