<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

Route::resource('user', UsuariosController::class);