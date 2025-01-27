<?php

use App\Http\Controllers\areaController;
use App\Http\Controllers\moduleController;
use App\Http\Controllers\newformController;
use App\Http\Controllers\newuserController;
use App\Http\Controllers\systemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tableController;
use App\Http\Controllers\userController;
use App\Http\Controllers\verdetallesController;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Request as FacadesRequest;

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


Route::view('/reports','table')->name('reports'); //Boton tabla de reportes



// Rutas para los controllers TABLA
Route::get('tables',[tableController::class, 'index'])->name('table.index')->middleware('auth.basic'); //Mostrar en tabla
Route::post('/detalles/{id}', [verdetallesController::class, 'store'])->name('reports.detalles'); //Editar
Route::get('/reports/{id}/detalles', [tableController::class, 'edit'])->name('reports.edit'); //vista editar
Route::delete('/delete/{id}', [tableController::class, 'destroy'])->name('reports.destroy')->middleware('auth.basic');

Route::get('/pdf', function (){
    $pdf = PDF::loadView('pdf');
    return $pdf->stream();
}) ->name('pdf');
//Temporal para la creacíon del pdf


// Controllers de catalogos
Route::post('newArea', [areaController::class, 'store'])->name('register.area');
Route::post('newSystem', [systemController::class, 'store'])->name('register.system');
Route::post('newModuleForm', [moduleController::class, 'store'])->name('register.module');
Route::post('newModule', [moduleController::class, 'create'])->name('register.newModule');

// Ruta para la tabla de usuarios
Route::get('users',[userController::class, 'index'])->name('users')->middleware('auth.basic');
Route::get('newuser',[userController::class,'create_function'])->name('newuser')->middleware('auth.basic');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/search-users', function (HttpRequest $request) {
    $query = $request->input('query');
    $users = User::where('name', 'LIKE', "%{$query}%")->get();
    return response()->json($users);
});

//Rutas de nuevo reporte
Route::get('/newform', [newformController::class,'create_function'])->name('newform')->middleware('auth.basic'); 
Route::post('/addreport', [newformController::class,'store'])->name('addreport')->middleware('auth.basic');//para ver el diseño del formulario de nuevo registro