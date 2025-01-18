@extends('layouts.app')

@section('title', 'Mis Proyectos')
@section('header', 'Mis Proyectos')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    
    <div class="flex items-center">
        <a href="" class="mb-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            {{ __('Agregar proyecto') }}
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">{{ __('Proyecto') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Estado') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Fecha de actualización') }}</th>
                <th class="border border-gray-300 px-4 py-2">{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $project->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $project->status }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $project->updated_at }}</td>
                <td class="border border-gray-300 px-4 py-2 justify-center items-center flex">
                    <a href="" class="mr-3 inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        {{ __('Marcar como cambiada') }}
                    </a>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
