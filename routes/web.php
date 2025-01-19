<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

// Ruta Bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Rutas Usuarios para el Admin 
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/update/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');

// Rutas Usuarios para el Usuario no Admin
Route::get('/users/edit', [UserController::class, 'editNoAdmin'])->name('users.edit');
Route::put('/users/update', [UserController::class, 'updateNoAdmin'])->name('users.update');

// Rutas Proyectos
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');