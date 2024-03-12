<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaginaController;
use App\Http\Controllers\NotasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PaginaController::class, 'dashboard']
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mostrar notas
Route::get('/notas', [PaginaController::class, 'notas']
)->middleware(['auth', 'verified'])->name('notas');
Route::get('/notas/view/{id}', [NotasController::class, 'abrirNota']
)->middleware(['auth', 'verified'])->name('abrirNota');

// Crear y Guardar notas
Route::get('/notas/crear', [NotasController::class, 'crearView'])->name('crearNota');
Route::post('/notas/crear', [NotasController::class, 'crear'])->name('crearNota');
Route::post('/notas/guardar', [NotasController::class, 'guardar'])->name('guardarNota');

require __DIR__.'/auth.php';
