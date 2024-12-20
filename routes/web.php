<?php

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
Route::view('/table', 'table');