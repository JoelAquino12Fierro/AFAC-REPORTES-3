<?php

use App\Http\Controllers\newformController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

// Route::get('tables', [User::class, 'index'])->name('table.tables') ->middleware('auth.basic');  //Solo usuarios autenticados acceden

// Para el diseño de las vistas
Route::view('/table', 'table')->name('table');

//para ver el diseño del formulario de nuevo registro
Route::get('/newform', [newformController::class, 'create'])->name('newform.create');
Route::post('/newform', [newformController::class, 'store'])->name('newform.store');