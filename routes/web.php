<?php

use App\Http\Controllers\areaController;
use App\Http\Controllers\systemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tableController;
use App\Http\Controllers\userController;
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
Route::view('/catalogos', 'catalogos')->name('catalogos'); //Ver en la barra de navegacion

Route::view('/newform', 'newform')->name('newform'); //para ver el diseño del formulario de nuevo registro
Route::view('/reports','table')->name('reports'); //Boton tabla de reportes



// Rutas para los controllers TABLA
Route::get('tables',[tableController::class, 'index'])->name('table.index')->middleware('auth.basic'); //Mostrar en tabla
Route::put('/update/{id}', [tableController::class, 'update'])->name('reports.update'); //Editar
Route::get('/reports/{id}/update', [tableController::class, 'edit'])->name('reports.edit'); //vista editar
Route::delete('/delete/{id}', [tableController::class, 'destroy'])->name('reports.destroy')->middleware('auth.basic');

Route::get('/pdf', function (){
    $pdf = PDF::loadView('pdf');
    return $pdf->stream();
}) ->name('pdf');
//Temporal para la creacíon del pdf


// Controllers de catalogos
Route::post('newArea', [areaController::class, 'store'])->name('register.area');
Route::post('newSystem', [systemController::class, 'store'])->name('register.system');

// Ruta para la tabla de usuarios
Route::get('users',[userController::class, 'index'])->name('users')->middleware('auth.basic');