@extends('layouts.app')

@section('title', 'Dashboard de Notificaciones')

@section('header', 'Dashboard de Notificaciones')

@section('content')
    <div class="mt-8">
        <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-3">
            <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
                <div class="text-sm font-medium text-[#1565C0] truncate">
                    Proyectos Sin Cambiar
                </div>
                <div class="mt-1 text-3xl font-semibold text-[#1565C0]">
                    8
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
                <div class="text-sm font-medium text-[#1565C0] truncate">
                    Notificaciones Pendientes
                </div>
                <div class="mt-1 text-3xl font-semibold text-[#1565C0]">
                    15
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
                <div class="text-sm font-medium text-[#1565C0] truncate">
                    Usuarios Activos
                </div>
                <div class="mt-1 text-3xl font-semibold text-[#1565C0]">
                    45
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
                            <th class="px-4 py-3">Proyecto</th>
                            <th class="px-4 py-3">Estado</th>
                            <th class="px-4 py-3">Última Actualización</th>
                            <th class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#FFFFFF] divide-y">
                        <tr class="text-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">Proyecto A</p>
                                        <p class="text-xs text-gray-600">Departamento IT</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-[#1565C0] bg-[#B3E5FC] rounded-full">
                                    Sin cambiar
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                Hace 2 meses
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <button class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#1565C0] border border-transparent rounded-md hover:bg-[#B3E5FC] hover:text-[#1565C0] focus:outline-none focus:ring">
                                    Marcar como cambiada
                                </button>
                            </td>
                        </tr>
                        <tr class="text-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">Proyecto B</p>
                                        <p class="text-xs text-gray-600">Departamento RRHH</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="px-2 py-1 font-semibold leading-tight text-[#1565C0] bg-[#B3E5FC] rounded-full">
                                    Cambiada
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                Hace 1 semana
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <button disabled class="px-3 py-1 text-sm font-medium leading-5 text-gray-400 bg-[#F5F5F5] border border-transparent rounded-md cursor-not-allowed">
                                    Actualizado
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-[#1565C0] bg-[#FFFFFF] border-t">
                Mostrando 2 de 25 proyectos
            </div>
        </div>
    </div>
@endsection