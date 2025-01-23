@extends('layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="mt-8">
        <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-3">
            <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
                <div class="text-sm font-medium text-[#1565C0] truncate">
                    {{ __('Proyectos Sin Actualizar Contraseña') }}
                </div>
                <div class="mt-1 text-3xl font-semibold text-[#1565C0]">
                    <span>{{ $countProjects }}</span>
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
                <div class="text-sm font-medium text-[#1565C0] truncate">
                    {{ __('Cantidad de Proyectos Asociados') }}
                </div>
                <div class="mt-1 text-3xl font-semibold text-[#1565C0]">
                    {{ $countProjectsTotal }}
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
                <div class="text-sm font-medium text-[#1565C0] truncate">
                    {{ __('Próxima Fecha de Actualización') }}
                </div>
                <div class="mt-1 text-3xl font-semibold text-[#1565C0]">
                    {{ $nameMonth }}
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-[#1565C0] uppercase border-b bg-[#FFFFFF]">
                            <th class="px-4 py-3">{{ __('Proyecto') }}</th>
                            <th class="px-4 py-3">{{ __('Estado') }}</th>
                            <th class="px-4 py-3">{{ __('Última Actualización') }}</th>
                            <th class="px-4 py-3">{{ __('Acciones') }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#FFFFFF] divide-y">
                    @foreach ($projectsWithoutChange as $projectWC)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">{{ $projectWC->name }}</p>
                                    <p class="text-xs text-gray-600">{{ __('Departamento IT') }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <span class="px-2 py-1 font-semibold leading-tight text-[#1565C0] bg-[#B3E5FC] rounded-full">
                                {{ $projectWC->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $projectWC->updated_at }}
                        </td>
                        <td class="px-4 py-3 text-sm"> 
                            <button disabled class="px-3 py-1 text-sm font-medium leading-5 text-gray-400 bg-[#F5F5F5] border border-transparent rounded-md cursor-not-allowed">
                                {{ __('Actualizada') }}
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-[#1565C0] bg-[#FFFFFF] border-t">
                {{ __('Mostrando los proyectos sin la contraseña cambiada') }}
                @php
                    // $projectsSinCambiar->count();
                @endphp
            </div>
        </div>
    </div>
@endsection