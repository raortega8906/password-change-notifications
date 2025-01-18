@extends('layouts.app')

@section('title', 'Crear Usuarios')
@section('header', 'Crear Usuarios')

@section('content')
<div class="mt-8">
    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
        <div class="p-6">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Nombre') }}</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1565C0] focus:ring-[#1565C0] sm:text-sm" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1565C0] focus:ring-[#1565C0] sm:text-sm" required>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Contraseña') }}</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1565C0] focus:ring-[#1565C0] sm:text-sm" required>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirmar Contraseña') }}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1565C0] focus:ring-[#1565C0] sm:text-sm" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#1565C0] border border-transparent rounded-md hover:bg-[#1976D2] focus:outline-none focus:ring-2 focus:ring-[#1565C0] focus:ring-offset-2">
                            {{ __('Crear Usuario') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
