<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CanchaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use App\Models\Cliente;
use App\Models\Reserva;
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


 // Rutas de autenticación para admin - clientes

 // Ruta para el admin -- clientes
Route::get('/admin/clientes', [ClienteController::class, 'index'])->name('admin.clientes.index')->middleware('auth');

// Ruta para el admin -- clientes
Route::get('/admin/clientes/create', [ClienteController::class, 'create'])->name('admin.clientes.create')->middleware('auth');

// Ruta para el admin -- secretarias
Route::post('/admin/clientes/create', [ClienteController::class, 'store'])->name('admin.clientes.store')->middleware('auth');

// Ruta para el admin -- show
Route::get('/admin/clientes/{id}', [ClienteController::class, 'show'])->name('admin.clientes.show')->middleware('auth');

// Ruta para el admin -- edit
Route::get('/admin/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('admin.clientes.edit')->middleware('auth');

// Ruta para el admin -- update
Route::put('/admin/clientes/{id}', [ClienteController::class, 'update'])->name('admin.clientes.update')->middleware('auth');

// Ruta para el admin -- delete
Route::get('/admin/clientes/{id}/confirm-delete', [ClienteController::class, 'confirmDelete'])->name('admin.clientes.confirmDelete')->middleware('auth');

// Ruta para el admin -- delete
Route::delete('/admin/clientes/{id}', [ClienteController::class, 'destroy'])->name('admin.clientes.destroy')->middleware('auth');



// Rutas de autenticación para admin - canchas

 // Ruta para el admin -- canchas
 Route::get('/admin/canchas', [CanchaController::class, 'index'])->name('admin.canchas.index')->middleware('auth');

 // Ruta para el admin -- canchas
 Route::get('/admin/canchas/create', [CanchaController::class, 'create'])->name('admin.canchas.create')->middleware('auth');
 
 // Ruta para el admin -- canchas
 Route::post('/admin/canchas/create', [CanchaController::class, 'store'])->name('admin.canchas.store')->middleware('auth');
 
 // Ruta para el admin -- canchas
 Route::get('/admin/canchas/{id}', [CanchaController::class, 'show'])->name('admin.canchas.show')->middleware('auth');
 
 // Ruta para el admin -- canchas
 Route::get('/admin/canchas/{id}/edit', [CanchaController::class, 'edit'])->name('admin.canchas.edit')->middleware('auth');
 
 // Ruta para el admin -- canchas
 Route::put('/admin/canchas/{id}', [CanchaController::class, 'update'])->name('admin.canchas.update')->middleware('auth');
 
 // Ruta para el admin -- delete
 Route::get('/admin/canchas/{id}/confirm-delete', [CanchaController::class, 'confirmDelete'])->name('admin.canchas.confirmDelete')->middleware('auth');
 
 // Ruta para el admin -- delete
 Route::delete('/admin/canchas/{id}', [CanchaController::class, 'destroy'])->name('admin.canchas.destroy')->middleware('auth');


 // Rutas de autenticación para admin - reservas

 // Ruta para el admin -- reservas
 Route::get('/admin/reservas', [ReservaController::class, 'index'])->name('admin.reservas.index')->middleware('auth');

 // Ruta para el admin -- canchas
 Route::get('/admin/reservas/create', [ReservaController::class, 'create'])->name('admin.reservas.create')->middleware('auth');
 
 // Ruta para el admin -- canchas
 Route::post('/admin/reservas/create', [ReservaController::class, 'store'])->name('admin.reservas.store')->middleware('auth');
 
 // Ruta para el admin -- canchas
 Route::get('/admin/reservas/{id}', [ReservaController::class, 'show'])->name('admin.reservas.show')->middleware('auth');
 
 // Ruta para el admin -- canchas
 Route::get('/admin/reservas/{id}/edit', [ReservaController::class, 'edit'])->name('admin.reservas.edit')->middleware('auth');
 
 // Ruta para el admin -- canchas
 Route::put('/admin/reservas/{id}', [ReservaController::class, 'update'])->name('admin.reservas.update')->middleware('auth');
 
 // Ruta para el admin -- delete
 Route::get('/admin/reservas/{id}/confirm-delete', [ReservaController::class, 'confirmDelete'])->name('admin.reservas.confirmDelete')->middleware('auth');
 
 // Ruta para el admin -- delete
 Route::delete('/admin/reservas/{id}', [ReservaController::class, 'destroy'])->name('admin.reservas.destroy')->middleware('auth');
 






