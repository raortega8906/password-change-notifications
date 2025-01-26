@extends('layouts.app')

@section('title', 'Actualizar Usuarios')
@section('header', 'Actualizar Usuarios')

@section('content')
<div class="mt-8">
    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
        <div class="p-6">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Nombre') }}</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#17630e] focus:ring-[#17630e] sm:text-sm" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#17630e] focus:ring-[#17630e] sm:text-sm" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#17630e] border border-transparent rounded-md hover:bg-[#17630e] focus:outline-none focus:ring-2 focus:ring-[#17630e] focus:ring-offset-2">
                            {{ __('Actualizar Usuario') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection