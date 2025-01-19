@extends('layouts.app')

@section('title', 'Crear Proyecto')
@section('header', 'Crear Proyecto')

@section('content')
<div class="mt-8">
    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
        <div class="p-6">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Proyecto') }}</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1565C0] focus:ring-[#1565C0] sm:text-sm" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-[#1565C0] border border-transparent rounded-md hover:bg-[#1976D2] focus:outline-none focus:ring-2 focus:ring-[#1565C0] focus:ring-offset-2">
                            {{ __('Agregar Proyecto') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
