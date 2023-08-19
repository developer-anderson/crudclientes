<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');

Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.salvar');

Route::put('clientes', [ClienteController::class, 'update'])->name('clientes.atualizar');

//Route::get('clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.mostrar');

Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.excluir');


