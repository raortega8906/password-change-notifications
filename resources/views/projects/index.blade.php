@extends('layouts.app')

@section('title', 'Mis Proyectos')
@section('header', 'Mis Proyectos')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    
    <div class="flex items-center">
        <a href="{{ route('projects.create') }}" class="mb-3 inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            {{ __('Agregar proyecto') }}
        </a>
    </div>

    <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-[#17630e] uppercase border-b bg-[#FFFFFF]">
                        <th class="px-4 py-3">{{ __('Proyecto') }}</th>
                        <th class="px-4 py-3">{{ __('Estado') }}</th>
                        <th class="px-4 py-3">{{ __('Fecha de actualización') }}</th>
                        <th class="px-4 py-3">{{ __('Estado contraseña') }}</th>
                        <th class="px-4 py-3">{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-[#FFFFFF] divide-y">
                    @foreach ($projects as $project)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">{{ $project->name }}</p>
                                    <p class="text-xs text-gray-600">Departamento IT</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-[#17630e] bg-[#d5f5e3] rounded-full">
                                {{ $project->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ ucfirst($project->updated_at->locale('es')->diffForHumans()) }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if ($project->status == 'Sin cambiar')
                                <form action="{{ route('projects.update', $project) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#17630e] border border-transparent rounded-md hover:bg-[#d5f5e3] hover:text-[#17630e] focus:outline-none focus:ring">
                                        {{ __('Marcar como cambiada') }}
                                    </a>
                                </form>
                            @else
                                <button disabled class="px-3 py-1 text-sm font-medium leading-5 text-gray-400 bg-[#F5F5F5] border border-transparent rounded-md cursor-not-allowed">
                                    {{ __('Actualizada') }}
                                </button>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center space-x-4">
                                <form action="{{ route('projects.delete', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring">
                                        {{ __('Eliminar') }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
@endsection
