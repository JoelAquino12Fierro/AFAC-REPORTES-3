<?php

use App\Http\Controllers\newformController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\table;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rutas para las vistas

Route::view('/table', 'table')->name('table');

//para ver el diseño del formulario de nuevo registro
Route::view('/newform', 'newform')->name('newform');
