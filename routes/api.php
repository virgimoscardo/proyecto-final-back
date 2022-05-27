<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioApiController;



Route::post('/contacto', [FormularioApiController::class, 'storeApiMensaje'])->name('api.mensaje.store');


