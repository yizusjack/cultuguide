<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CostoController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ReclamoController;
use App\Http\Controllers\ExhibicionController;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\NotificationController;

Route::get('/', function () {
    return view('landing.landing');
});

Route::get('hola', function () {
    return view('comentarios.comentarios');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
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

Route::post('rutas/{lugar}/asignar', [RutaController::class, 'asignar'])
    ->middleware('auth')
    ->name('ruta.asignar');

//Rutas para los costos
Route::resource('costos', CostoController::class);

//Rutas para reclamos
Route::get('reclamo', 
    [ReclamoController::class, 'index'])
    ->name('reclamo.index')
    ->middleware('auth');

Route::post('reclamo/{lugar}/store', 
    [ReclamoController::class, 'store'])
    ->name('reclamo.store')
    ->middleware('auth');



//Rutas para mercado pago
Route::post('entrada', [MercadoPagoController::class, 'generarOrdenEntrada'])
    ->middleware('auth')
    ->name('mercadopago.generarOrdenEntrada');

Route::get('entrada/success', [MercadoPagoController::class, 'success'])
    ->middleware('auth')
    ->name('mercadopago.success');

Route::get('entrada/failure', [MercadoPagoController::class, 'failure'])
    ->middleware('auth')
    ->name('mercadopago.failure');

//Rutas para las  notificaciones
Route::get('notification',
    [NotificationController::class, 'index'])
    ->name('notification.index')
    ->middleware('auth');

//Rutas para control de usuarios
Route::get('user',
    [UserController::class, 'index'])
    ->name('user.index')
    ->middleware('auth');

Route::post('user/{user}/modify',
    [UserController::class, 'modify'])
    ->name('user.modify')
    ->middleware('auth');
