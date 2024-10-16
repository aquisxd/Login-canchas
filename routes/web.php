<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use App\Models\Secretaria;
use GuzzleHttp\Promise\Create;

// Ruta principal
Route::get('/', function () {
    return view('index');
});

// Rutas de autenticación para admin - usuarios
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


 // Rutas de autenticación para admin - secretarias

 // Ruta para el admin -- secretarias
Route::get('/admin/secretarias', [SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware('auth');

 // Ruta para el admin -- secretarias
 Route::get('/admin/secretarias/create', [SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware('auth');

 // Ruta para el admin -- secretarias
 Route::post('/admin/secretarias/create', [SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware('auth');

 // Ruta para el admin -- show
Route::get('/admin/secretarias/{id}', [SecretariaController::class, 'show'])->name('admin.secretarias.show')->middleware('auth');

// Ruta para el admin -- edit
Route::get('/admin/secretarias/{id}/edit', [SecretariaController::class, 'edit'])->name('admin.secretarias.edit')->middleware('auth');

// Ruta para el admin -- update
Route::put('/admin/secretarias/{id}', [SecretariaController::class, 'update'])->name('admin.secretarias.update')->middleware('auth');

 // Ruta para el admin -- delete
Route::get('/admin/secretarias/{id}/confirm-delete', [SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')->middleware('auth');

 // Ruta para el admin -- delete
 Route::delete('/admin/secretarias/{id}', [SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware('auth');



