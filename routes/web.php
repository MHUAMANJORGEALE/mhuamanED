<?php

/*use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;

// php artisan route:list
Route::get('login', [AuthController::class, 'mostrarLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);


Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'mostrarDashboard'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('categoria', CategoriaController::class);
    Route::resource('producto', ProductoController::class);
});*/

//Rutas de eventos y entradas 

use App\Http\Controllers\EventoController;
use App\Http\Controllers\EntradaController;

Route::resource('eventos', EventoController::class);
Route::resource('entradas', EntradaController::class);
