<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacasController;
use App\Http\Controllers\AgendaController;


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

