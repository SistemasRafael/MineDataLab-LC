<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArgEmprUnidadesController;

Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/signin', [AuthController::class, 'signIn'])->name('auth.signin');
Route::get('/logout', [AuthController::class, 'logOut'])->name('auth.logout');

Route::middleware(['check.user.access'])->group(function () {
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('arg-empr-unidades', ArgEmprUnidadesController::class);
    Route::post('/cambiar-mina', [ArgEmprUnidadesController::class, 'changeMine'])->name('mina.cambiar');
});
