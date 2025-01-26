@extends('layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="mt-8">
        <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-3">
            <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
                <div class="text-sm font-medium text-[#17630e] truncate">
                    {{ __('Mis Proyectos Asociados') }}
                </div>
                <div class="mt-1 text-3xl font-semibold text-[#17630e]">
                    {{ $countProjectsTotal }}
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
                <div class="text-sm font-medium text-[#17630e] truncate">
                    {{ __('Proyectos Sin Actualizar Contraseña') }}
                </div>
                <div class="mt-1 text-3xl font-semibold text-[#17630e]">
                    <span>{{ $countProjects }}</span>
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
                <div class="text-sm font-medium text-[#17630e] truncate">
                    {{ __('Próxima Fecha de Actualización') }}
                </div>
                <div class="mt-1 text-3xl font-semibold text-[#17630e]">
                    {{ $nameMonth }}
                </div>
            </div>
        </div>
    </div>

    <div class="w-full px-4 py-5 bg-[#FFFFFF] rounded-lg shadow">
        <h2 class="text-sm font-medium text-[#17630e] truncate">{{ __('Generador de Contraseña') }}</h2>
        <div class="flex items-center space-x-4">
            <input
                type="text"
                id="passwordInput"
                placeholder="Contraseña"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#17630e] focus:ring-[#17630e] sm:text-sm"
                readonly
            />
            <button
                id="generatePasswordBtn"
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#17630e] border border-transparent rounded-md hover:bg-[#17630e] focus:outline-none focus:ring-2 focus:ring-[#17630e] focus:ring-offset-2"
            >
                {{ __('Generar') }}
            </button>
        </div>
    </div>    

    <div class="mt-8">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-[#17630e] uppercase border-b bg-[#FFFFFF]">
                            <th class="px-4 py-3">{{ __('Proyecto') }}</th>
                            <th class="px-4 py-3">{{ __('Estado') }}</th>
                            <th class="px-4 py-3 flex justify-center">{{ __('Última Actualización de contraseña') }}</th>
                            {{-- <th class="px-4 py-3">{{ __('Acciones') }}</th> --}}
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
                            <span class="px-2 py-1 font-semibold leading-tight text-[#17630e] bg-[#d5f5e3] rounded-full">
                                {{ $projectWC->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm flex justify-center">
                            {{ ucfirst($projectWC->updated_at->locale('es')->diffForHumans()) }}
                        </td>
                        {{-- <td class="px-4 py-3 text-sm"> 
                            <button disabled class="px-3 py-1 text-sm font-medium leading-5 text-gray-400 bg-[#F5F5F5] border border-transparent rounded-md cursor-not-allowed">
                                {{ __('Actualizada') }}
                            </button>
                        </td> --}}
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-[#17630e] bg-[#FFFFFF] border-t">
                {{ __('Mostrando los proyectos sin la contraseña cambiada') }}
                @php
                    // $projectsSinCambiar->count();
                @endphp
            </div>
        </div>
    </div>
@endsection

<script>
    addEventListener('DOMContentLoaded', function () {
        var button = document.querySelector('button#generatePasswordBtn');
    
        if (button) {
            button.addEventListener('click', function () {
                const length = 12;
                const charset =
                    "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>?";
                let password = "";
                for (let i = 0; i < length; i++) {
                    const randomIndex = Math.floor(Math.random() * charset.length);
                    password += charset[randomIndex];
                }
                const passwordInput = document.querySelector('input#passwordInput');
                passwordInput.value = password;
    
                // Crear el botón de copiar si no existe
                let copyButton = document.querySelector('button#copyPasswordBtn');
                if (!copyButton) {
                    copyButton = document.createElement('button');
                    copyButton.id = 'copyPasswordBtn';
                    copyButton.textContent = 'Copiar';
                    copyButton.className = 'px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#17630e] border border-transparent rounded-md hover:bg-[#17630e] focus:outline-none focus:ring-2 focus:ring-[#17630e] focus:ring-offset-2';
    
                    // Insertar el botón después del input
                    passwordInput.parentNode.appendChild(copyButton);
                }
    
                // Limpiar eventos previos antes de agregar el evento de copiar
                copyButton.replaceWith(copyButton.cloneNode(true));
                copyButton = document.querySelector('button#copyPasswordBtn');
    
                // Agregar evento para copiar la contraseña al portapapeles
                copyButton.addEventListener('click', function () {
                    navigator.clipboard.writeText(passwordInput.value).then(() => {
                        alert('¡Contraseña copiada al portapapeles!');
                    }).catch(err => {
                        alert('Error al copiar la contraseña: ' + err);
                    });
                });
            });
        } else {
            console.error('Lo siento, hubo un error');
        }
    });
</script>    