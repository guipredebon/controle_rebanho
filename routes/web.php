<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacasController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EventosController;


Route::get('/', function () {
    return view('welcome');
});

/**
 * Usando rotas de Controladores com a Sintaxe de Classe.
 * Aproveita o recurso de controladores e permite uma melhor organização do código.
 * Também é mais seguro, pois você está chamando diretamente os métodos do controlador.
 */

Route::get('/vacas', [VacasController::class, 'index'])->name('vacas.index');
Route::get('/vacas/create', [VacasController::class, 'create'])->name('vacas.create');
Route::post('/vacas', [VacasController::class, 'store'])->name('vacas.store');
Route::get('/vacas/{vaca}', [VacasController::class, 'show'])->name('vacas.show');
Route::get('/vacas/{vaca}/edit', [VacasController::class, 'edit'])->name('vacas.edit');
Route::put('/vacas/{vaca}', [VacasController::class, 'update'])->name('vacas.update');
Route::delete('/vacas/{vaca}', [VacasController::class, 'destroy'])->name('vacas.destroy');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');

Route::get('/eventos', [EventosController::class, 'index'])->name('eventos.index');
Route::get('/eventos/create', [EventosController::class, 'create'])->name('eventos.create');
Route::post('/eventos', [EventosController::class, 'store'])->name('eventos.store');
Route::get('/eventos/{evento}', [EventosController::class, 'show'])->name('eventos.show');
Route::get('/eventos/{evento}/edit', [EventosController::class, 'edit'])->name('eventos.edit');
Route::put('/eventos/{evento}', [EventosController::class, 'update'])->name('eventos.update');
Route::delete('/eventos/{evento}', [EventosController::class, 'destroy'])->name('eventos.destroy');

