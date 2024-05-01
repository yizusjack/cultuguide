<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ExhibicionController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\RutaController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Rutas para la administración de los lugares
Route::resource('lugar', LugarController::class);

//Rutas para las imágenes
Route::resource('imagen', ImagenController::class);

//rutas para la administración de exhibiciones
Route::resource('exhibicion', ExhibicionController::class);

//Rutas para los eventos
Route::resource('evento', EventoController::class);

//Rutas para las rutas de transporte
Route::resource('rutas', RutaController::class);
