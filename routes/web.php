<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;

// Ruta principal
Route::get('/', function () {
    return view('index');
});

// Rutas de autenticación
Auth::routes();

// Ruta para el home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Ruta para el admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

// Ruta para el admin -- usuarios
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');


// Ruta para el admin -- usuarios
Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');

// Ruta para el admin -- usuarios
Route::post('/admin/usuarios/create', [UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');

// Ruta para el admin -- show
Route::get('/admin/usuarios/{id}', [UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth');

// Ruta para el admin -- edit
Route::get('/admin/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');

// Ruta para el admin -- update
Route::put('/admin/usuarios/{id}', [UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');

 // Ruta para el admin -- delete
Route::get('/admin/usuarios/{id}/confirm-delete', [UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->middleware('auth');

 // Ruta para el admin -- delete
 Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth');



