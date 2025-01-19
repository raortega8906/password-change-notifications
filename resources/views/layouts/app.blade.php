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
            <a href="{{ url('/') }}" class="text-white flex items-center space-x-2 px-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span class="text-2xl font-extrabold">{{ __('Notificaciones') }}</span>
            </a>
            <nav>
                <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-[#B3E5FC] hover:text-[#1565C0]">
                    {{ __('Dashboard') }}
                </a>
                <a href="{{ route('projects.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-[#B3E5FC] hover:text-[#1565C0]">
                    {{ __('Proyectos') }}
                </a>
                <a href="{{ route('users.edit') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-[#B3E5FC] hover:text-[#1565C0]">
                    {{ __('Mi perfil') }}
                </a>

                <div class="py-3 mt-6">
                    <span class="text-[25px] py-3 px-4 font-extrabold">{{ __('Panel Admin') }}</span>
                </div>
                @if (Auth::user()->email == 'raortega8906@gmail.com')
                    <a href="{{ route('admin.users.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-[#B3E5FC] hover:text-[#1565C0]">
                        {{ __('Usuarios') }}
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-[#B3E5FC] hover:text-[#1565C0]">
                        {{ __('Proyectos') }}
                    </a>
                @endif
            </nav>
        </div>

        <!-- Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top bar -->
            <header class="bg-[#FFFFFF] shadow-md">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-[#1565C0]">@yield('header', 'Panel de Control')</h1>
                    <ul class="flex ml-auto items-center space-x-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-1xl font-semibold text-[#1565C0]">
                            {{ __('Cerrar Sesión') }}
                        </button>
                    </form>
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