<?php

use App\Http\Controllers\editor;
use App\Http\Controllers\usuarios;
use App\Http\Controllers\proyectosController;
use App\Models\proyectos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::view('/','welcome')->name('welcome');

//Inicio rutas Login
Route::view('/login', 'vistas.login')->name('login');
Route::post('/login',[usuarios::class,'authLog'])->name('loging');
Route::post('/logout',[usuarios::class,'logout'])->name('logout')->middleware('auth');
//fin rutas Login
//Inicio rutas Usuario
// Route::get('/usuarios',[usuarios::class,'userList'])->name('userList')->middleware('can:registroUsuario');
Route::resource('/usuarios', usuarios::class)->middleware('can:registroUsuario');
Route::get('/registro',[usuarios::class,'userRegistro'])->name('userRegistro')->middleware('can:registroUsuario');
Route::post('/registro/guardar',[usuarios::class,'gUser'])->name('userSave')->middleware('can:registroUsuario');
Route::get('/usuarios/edit/{id}/{listas}',[usuarios::class,'userEdit'])->name('userEdit')->middleware('can:registroUsuario');
Route::get('/usuarios/editus/{id}',[usuarios::class,'userEdit1'])->name('userEdit1')->middleware('auth');
Route::put('/usuarios/update/{user}',[usuarios::class,'userUpdate'])->name('userUpdate')->middleware('can:registroUsuario');
Route::put('/usuarios/updateus/{user}',[usuarios::class,'userUpdate1'])->name('userUpdate1');
Route::view('/password', 'vistas.password')->name('password');
Route::post('/usuarios/updatepassword',[usuarios::class,'userUpdatePassword'])->name('userUpdatepass')->middleware('can:userAdmin');
Route::get('/usuarios/userdelete/{id}/{listas}', [usuarios::class,'userDelete'])->name('userDelete')->middleware('can:userAdmin');
Route::get('/usuarios/useractive/{id}/{listas}', [usuarios::class,'userActive'])->name('userActive')->middleware('can:userAdmin');
//fin rutas usuario
Route::get('/roles', [usuarios::class,'roles'])->name('roleList')->middleware('can:userAdmin');
Route::post('/rolespermisos/nuevoRol',[usuarios::class,'crearRol'])->name('nuevoRol')->middleware('can:userAdmin');
// Route::post('/usuarios/rolespermisos/nuevoPermiso',[usuarios::class,'crearPermiso'])->name('nuevoPermiso')->middleware('auth');
Route::get('/rolespermisos/editRol/{id}',[usuarios::class,'editRol'])->name('roleEdit')->middleware('can:userAdmin');
Route::post('/rolespermisos/updateRol',[usuarios::class,'updateRol'])->name('updateRol')->middleware('can:userAdmin');


//Rutas proyectos
Route::resource('/proyectos', proyectosController::class);
Route::view('/proyecto/nuevo', 'vistas.registroProyecto')->name('rProyecto');
Route::post('/proyecto/registro', [proyectosController::class,'regProyecto'])->name('nuevoProyecto');
Route::get('/proyecto/editor/{id}',[editor::class,'show'])->name('editProyecto');
Route::post('/proyecto/editor/guardar',[editor::class,'guardar'])->name('saveContenido');
Route::get('/proyecto/informacion/{id}',[proyectosController::class,'informacion'])->name('infoProyecto');
Route::post('/proyecto/informacion/edit',[proyectosController::class,'informacion'])->name('einfoProyecto');
Route::post('/proyecto/unirse',[proyectosController::class,'unirseProyecto'])->name('unirseP');
Route::get('/proyecto/aceptarAlumno',[proyectosController::class,'aceptarAlumno'])->name('aceptarAlumno');
Route::get('/proyecto/noaceptarAlumno',[proyectosController::class,'noaceptarAlumno'])->name('noaceptarAlumno');


// Route::post('/proyecto/img/subir/', [editor::class,'subirImg'])->name('subirImg');
// Route::get('/proyecto/img/ver',[editor::class,'verImg']);
