<?php
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('clientes.index');
});

Route::get('clientes/novo', function () {
    return view('clientes.form');
})->name('clientes.novo');

Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.editar');

Route::get('clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.mostrar');
