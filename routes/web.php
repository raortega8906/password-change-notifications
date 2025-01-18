<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
Route::get('/admin/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/edit/{user}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/update/{user}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/delete/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');
