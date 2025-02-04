@extends('layouts.app')

@section('title', 'Usuarios')
@section('header', 'Usuarios')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    
    <div class="flex items-center">
        <a href="{{ route('admin.users.create') }}" class="mb-3 inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            {{ __('Crear usuario') }}
        </a>
    </div>

    <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-[#17630e] uppercase border-b bg-[#FFFFFF]">
                        <th class="px-4 py-3">{{ __('ID') }}</th>
                        <th class="px-4 py-3">{{ __('Nombre') }}</th>
                        <th class="px-4 py-3">{{ __('Email') }}</th>
                        <th class="px-4 py-3">{{ __('Proyectos') }}</th>
                        <th class="px-4 py-3">{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-[#FFFFFF] divide-y">
                    @foreach ($users as $user)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">
                            {{ $user->id }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">{{ $user->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $user->email }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $user->projects->count() }} {{ __('asociados') }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('admin.users.edit', $user) }}" 
                                   class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#17630e] border border-transparent rounded-md hover:bg-[#d5f5e3] hover:text-[#17630e] focus:outline-none focus:ring">
                                    {{ __('Editar') }}
                                </a>
                                <form action="{{ route('admin.users.delete', $user) }}" method="POST">
                                    @csrf
                                    @method('delete')
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
