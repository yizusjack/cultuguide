<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ExhibicionController;

Route::get('/', function () {
    return view('landing.landing');
});

Route::get('hola', function () {
    return view('landing.inicioSesion');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('landing.landing');
    })->name('dashboard');
});

//Rutas para la administración de los lugares
Route::resource('lugar', LugarController::class);

//Rutas para las imágenes
Route::resource('imagen', ImagenController::class);

//rutas para la administración de exhibiciones
Route::resource('exhibicion', ExhibicionController::class);