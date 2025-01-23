@extends('layouts.app')

@section('title', 'Proyectos')
@section('header', 'Proyectos') 

@section('content')
<div class="bg-white p-6 rounded-lg shadow">

    <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-[#1565C0] uppercase border-b bg-[#FFFFFF]">
                        <th class="px-4 py-3">{{ __('Proyecto') }}</th>
                        <th class="px-4 py-3">{{ __('Estado') }}</th>
                        <th class="px-4 py-3">{{ __('Fecha de actualización') }}</th>
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
                            <span class="px-2 py-1 font-semibold leading-tight text-[#1565C0] bg-[#B3E5FC] rounded-full">
                                {{ $project->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ ucfirst($project->updated_at->locale('es')->diffForHumans()) }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center space-x-4">
                                <form action="{{ route('admin.projects.delete', $project) }}" method="POST">
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
