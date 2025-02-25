<?php

use App\Http\Controllers\areaController;
use App\Http\Controllers\catalogsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ejemplo;
use App\Http\Controllers\moduleController;
use App\Http\Controllers\newformController;
use App\Http\Controllers\pdf2;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\RecoverPasswordController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\roles;
use App\Http\Controllers\systemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tableController;
use App\Http\Controllers\UsController;
use App\Http\Controllers\userController as User;
use App\Http\Controllers\verdetallesController;
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
Route::view('/reports', 'table')->name('reports'); //Boton tabla de reportes

// Rutas para los controllers TABLA
Route::get('tables', [tableController::class, 'index'])->name('table.index')->middleware('auth.basic'); //Mostrar en tabla
Route::post('/actualizar-reporte/{id}', [tableController::class, 'updateDescripcion'])->name('ejemplo.update');
Route::get('/get-modules/{systemId}', [tableController::class, 'getModules']);
Route::get('/get-areas', [tableController::class, 'getAreas']);
Route::post('/upload-evidence', [tableController::class, 'uploadEvidence'])->name('upload.evidence');
Route::delete('/delete/{id}', [tableController::class, 'destroy'])->name('reports.destroy')->middleware('auth.basic');




Route::get('pdf/{id}', [pdfController::class, 'index'])->name('pdf')->middleware('auth.basic');



// Controllers de catalogos
Route::get('catalogos', [catalogsController::class, 'index'])->name('catalogos'); //Ver en la barra de navegacion
Route::post('newArea', [areaController::class, 'store'])->name('register.area');
Route::post('newSystem', [systemController::class, 'store'])->name('register.system');
Route::post('systeModule', [catalogsController::class, 'store'])->name('register.sysmod');
Route::post('newModule', [moduleController::class, 'store'])->name('register.module');

// Ruta para la tabla de usuarios
Route::get('user', [UsController::class, 'index'])->name('users')->middleware('auth.basic');
Route::delete('/user/delete/{id}', [UsController::class, 'destroy'])->name('deleteUser');

Route::put('/users/update/{id}', [UsController::class, 'update'])->name('editUser')->middleware('auth.basic');
Route::post('adduser',[UsController::class,'store'])->name('adduser')->middleware('auth.basic');
Route::get('area',[UsController::class,'areas'])->name('areauser')->middleware('auth.basic');
Route::get('/positions/{areaId}', [UsController::class, 'getPositionsByArea'])->name('positions.byArea');
Route::post('/responsibilities', [UsController::class, 'storeResponsibility'])->name('responsibilities.store');
// Ruta para obtener todas las áreas EDITAR
Route::get('/users/areas', [UsController::class, 'getAllAreas'])->name('areauser');
// Ruta para obtener cargos por área EDITAR
Route::get('/users/positions/{areaId}', [UsController::class, 'getPositionsByArea'])->name('positions.byArea');
// Ruta para obtener el área y cargo de un usuario EDITAR
Route::get('/users/area/{id}', [UsController::class, 'getUserAreaAndPosition'])->name('getUserArea');



//Rutas de nuevo reporte
Route::get('/newform', [newformController::class, 'create_function'])->name('newform')->middleware('auth.basic');
Route::post('/addreport', [newformController::class, 'store'])->name('addreport')->middleware('auth.basic'); //para ver el diseño del formulario de nuevo registro


// Ruta de roles

Route::get('rol', [roles::class, 'index'])->name('roles'); //Ver en la barra de navegacion
Route::post('/role', [roles::class, 'store'])->name('roles.store'); //crear un nuevo rol
Route::delete('/roles/{id}', [roles::class, 'destroy'])->name('roles.destroy'); //Eliminar un rol
Route::put('/roles/{id}', [roles::class, 'update'])->name('roles.update'); // Actualizar un rol