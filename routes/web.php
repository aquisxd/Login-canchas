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
Route::POST('/admin/usuarios/create', [UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');


