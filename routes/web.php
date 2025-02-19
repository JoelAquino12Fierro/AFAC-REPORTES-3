<?php

use App\Http\Controllers\areaController;
use App\Http\Controllers\catalogsController;
use App\Http\Controllers\moduleController;
use App\Http\Controllers\newformController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\RecoverPasswordController;
use App\Http\Controllers\roles;
use App\Http\Controllers\systemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tableController;
use App\Http\Controllers\userController;
use App\Http\Controllers\verdetallesController;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request as HttpRequest;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;

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



Route::view('/reports','table')->name('reports'); //Boton tabla de reportes



// Rutas para los controllers TABLA
Route::get('tables',[tableController::class, 'index'])->name('table.index')->middleware('auth.basic'); //Mostrar en tabla
Route::put('/detalles/{id}', [verdetallesController::class, 'update'])->name('reports.detalles'); //Guarda el nuevo formulario
Route::get('/reports/{id}/detalles', [tableController::class, 'edit'])->name('reports.edit'); //vista editar
Route::delete('/delete/{id}', [tableController::class, 'destroy'])->name('reports.destroy')->middleware('auth.basic');

Route::get('pdf/{id}',[pdfController::class,'index'])->name('pdf')->middleware('auth.basic');
// Route::get('/pdf{id}', function (){
//     $pdf = PDF::loadView('pdf');
//     return $pdf->stream();
// }) ->name('pdf');
//Temporal para la creacíon del pdf


// Controllers de catalogos
Route::get('catalogos', [catalogsController::class,'index'])->name('catalogos'); //Ver en la barra de navegacion
Route::post('newArea', [areaController::class, 'store'])->name('register.area');
Route::post('newSystem', [systemController::class, 'store'])->name('register.system');
Route::post('systeModule', [catalogsController::class, 'store'])->name('register.sysmod');
Route::post('newModule', [moduleController::class, 'store'])->name('register.module');

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


// Ruta de roles

Route::get('rol', [roles::class,'index'])->name('roles'); //Ver en la barra de navegacion
Route::post('/role', [roles::class, 'store'])->name('roles.store'); //crear un nuevo rol
Route::delete('/roles/{id}', [roles::class, 'destroy'])->name('roles.destroy'); //Eliminar un rol
Route::put('/roles/{id}', [roles::class, 'update'])->name('roles.update'); // Actualizar un rol



//ruta de recuperación de contraseña 
Route::get('/recover-password', [RecoveryCodeController::class, 'index'])->name('recover');
