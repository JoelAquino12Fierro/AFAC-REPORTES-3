<?php
use App\Http\Controllers\Controller;
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
Route::view('/catalogos', 'catalogos')->name('catalogos');
Route::view('/newform', 'newform')->name('newform'); //para ver el diseño del formulario de nuevo registro
Route::view('/reports','table')->name('reports'); //Boton tabla de reportes



// Rutas para los controllers
Route::get('tables',[table::class, 'index'])->name('table.index')->middleware('auth.basic'); //Mostrar en tabla
Route::put('/update/{id}', [table::class, 'update'])->name('reports.update'); //Editar
Route::get('/reports/{id}/update', [table::class, 'edit'])->name('reports.edit'); //vista editar
Route::delete('/delete/{id}', [table::class, 'destroy'])->name('reports.destroy')->middleware('auth.basic');

Route::get('/pdf', function (){
    $pdf = PDF::loadView('pdf');
    return $pdf->stream();
}) ->name('pdf');
//Temporal para la creacíon del pdf