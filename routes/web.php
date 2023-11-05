<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacasController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\EventoController;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Usando rotas de Controladores com a Sintaxe de Classe.
 * Aproveita o recurso de controladores e permite uma melhor organização do código.
 * Também é mais seguro, pois está chamando diretamente os métodos do controlador.
 */

Route::get('/vacas', [VacasController::class, 'index'])->name('vacas.index');
Route::get('/vacas/create', [VacasController::class, 'create'])->name('vacas.create');
Route::post('/vacas', [VacasController::class, 'store'])->name('vacas.store');
Route::get('/vacas/{vaca}', [VacasController::class, 'show'])->name('vacas.show');
Route::get('/vacas/{vaca}/edit', [VacasController::class, 'edit'])->name('vacas.edit');
Route::put('/vacas/{vaca}', [VacasController::class, 'update'])->name('vacas.update');
Route::delete('/vacas/{vaca}', [VacasController::class, 'destroy'])->name('vacas.destroy');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::post('/salvarEvento', [AgendaController::class, 'salvarEvento']);

Route::get('/tipos_evento', [TipoEventoController::class, 'index'])->name('tipos_evento.index');
Route::get('/tipos_evento/create', [TipoEventoController::class, 'create'])->name('tipos_evento.create');
Route::post('/tipos_evento', [TipoEventoController::class, 'store'])->name('tipos_evento.store');
Route::get('/tipos_evento/{tipoEvento}', [TipoEventoController::class, 'show'])->name('tipos_evento.show');
Route::get('/tipos_evento/{tipoEvento}/edit', [TipoEventoController::class, 'edit'])->name('tipos_evento.edit');
Route::put('/tipos_evento/{tipoEvento}', [TipoEventoController::class, 'update'])->name('tipos_evento.update');
Route::delete('/tipos_evento/{tipoEvento}', [TipoEventoController::class, 'destroy'])->name('tipos_evento.destroy');

Route::get('/opcoes/vacas', [EventoController::class, 'opcoesVacas']);
Route::get('/opcoes/tipo-evento', [EventoController::class, 'opcoesTipoEvento']);




