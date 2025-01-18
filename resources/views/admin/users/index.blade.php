@extends('layouts.app')

@section('title', 'Usuarios')
@section('header', 'Usuarios')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    
    <div class="flex items-center">
        <a href="{{ route('admin.users.create') }}" class="mb-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            {{ __('Crear usuario') }}
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">{{ __('ID') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Nombre') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Email') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                <td class="border border-gray-300 px-4 py-2 justify-center items-center flex">
                    <a href="{{ route('admin.users.create') }}" class="mb-3 mr-3 inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">{{ __('Editar') }}</a><br>
                    <a href="{{ route('admin.users.create') }}" class="mb-3 inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">{{ __('Eliminar') }}</a><br>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
