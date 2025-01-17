@extends('layouts.app')

@section('title', 'Usuarios')
@section('header', 'Usuarios')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('admin.users.create') }}">{{ __('Crear') }}</a><br>
                    <a href="{{ route('admin.users.create') }}">{{ __('Editar') }}</a><br>
                    <a href="{{ route('admin.users.create') }}">{{ __('Eliminar') }}</a><br>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
