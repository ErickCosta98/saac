<?php

use App\Http\Controllers\editor;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\usuarios;
use App\Http\Controllers\proyectosController;
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
Route::get('/',[proyectosController::class,'verProyectosa'])->name('welcome');

//Inicio rutas Login
Route::view('/login', 'vistas.login')->name('login');
Route::post('/login',[usuarios::class,'authLog'])->name('loging');
Route::post('/logout',[usuarios::class,'logout'])->name('logout')->middleware('auth');
//fin rutas Login
//Inicio rutas Usuario
// Route::get('/usuarios',[usuarios::class,'userList'])->name('userList')->middleware('can:registroUsuario');
Route::view('/usuarios','vistas.userList')->name('usuarios')->middleware('auth')->middleware('can:registroUsuario');
Route::get('/usuarios/info', [usuarios::class,'index'])->name('listasUser')->middleware('auth')->middleware('can:registroUsuario');
Route::get('/registro',[usuarios::class,'userRegistro'])->name('userRegistro')->middleware('can:registroUsuario');
Route::post('/registro/guardar',[usuarios::class,'gUser'])->name('userSave')->middleware('can:registroUsuario');
Route::get('/usuarios/edit/{id}/{listas}',[usuarios::class,'userEdit'])->name('userEdit')->middleware('can:registroUsuario');
Route::get('/usuarios/editus/{id}',[usuarios::class,'userEdit1'])->name('userEdit1')->middleware('auth');
Route::put('/usuarios/update/{user}',[usuarios::class,'userUpdate'])->name('userUpdate')->middleware('can:registroUsuario');
Route::put('/usuarios/updateus/{user}',[usuarios::class,'userUpdate1'])->name('userUpdate1')->middleware('auth');
Route::view('/password', 'vistas.password')->name('password')->middleware('auth');
Route::post('/usuarios/updatepassword',[usuarios::class,'userUpdatePassword'])->name('userUpdatepass')->middleware('auth');
Route::get('/usuarios/resetPassword',[usuarios::class,'passwordReset'])->name('passwordReset')->middleware('can:userAdmin');

Route::get('/usuarios/userdelete', [usuarios::class,'userDelete'])->name('userDelete')->middleware('can:registroUsuario');
// Route::get('/usuarios/useractive/{id}/{listas}', [usuarios::class,'userActive'])->name('userActive')->middleware('can:userAdmin');
//fin rutas usuario
Route::get('/roles', [usuarios::class,'roles'])->name('roleList')->middleware('can:userAdmin');
Route::post('/rolespermisos/nuevoRol',[usuarios::class,'crearRol'])->name('nuevoRol')->middleware('can:userAdmin');
Route::post('/usuarios/rolespermisos/nuevoPermiso',[usuarios::class,'crearPermiso'])->name('nuevoPermiso')->middleware('auth');
Route::get('/rolespermisos/editRol/{id}',[usuarios::class,'editRol'])->name('roleEdit')->middleware('can:userAdmin');
Route::post('/rolespermisos/updateRol',[usuarios::class,'updateRol'])->name('updateRol')->middleware('can:userAdmin');


//Rutas proyectos
Route::view('/proyectos','vistas.listaProyectos')->name('proyectoList')->middleware('auth');
Route::get('/proyectos/lista',[proyectosController::class,'index'])->middleware('auth');
Route::view('/proyecto/nuevo', 'vistas.registroProyecto')->name('rProyecto')->middleware('auth');
Route::post('/proyecto/registro', [proyectosController::class,'regProyecto'])->name('nuevoProyecto')->middleware('auth');
Route::get('proyecto/editor/{id}',[editor::class,'show'])->name('editProyecto')->middleware('auth');
Route::post('/proyecto/editor/guardar',[editor::class,'guardar'])->name('saveContenido')->middleware('auth');
Route::get('/proyecto/informacion/{id}',[proyectosController::class,'informacion'])->name('infoProyecto')->middleware('auth');
Route::post('/proyecto/informacion/edit',[proyectosController::class,'informacionEdit'])->name('einfoProyecto')->middleware('auth');
Route::post('/proyecto/unirse',[proyectosController::class,'unirseProyecto'])->name('unirseP')->middleware('auth');
Route::get('/proyecto/aceptarAlumno',[proyectosController::class,'aceptarAlumno'])->name('aceptarAlumno')->middleware('auth');
Route::get('/proyecto/noaceptarAlumno',[proyectosController::class,'noaceptarAlumno'])->name('noaceptarAlumno')->middleware('auth');
Route::get('/proyecto/aceptar',[proyectosController::class,'aceptarProyecto'])->name('Aceptarproyecto')->middleware('auth');
Route::get('/proyecto/delete',[proyectosController::class,'deleteProyecto'])->name('deleteProyecto')->middleware('auth');

Route::get('/proyecto/{codigo}',[proyectosController::class,'verProyectopage'])->name('verProyectoa');







// Route::post('/proyecto/img/subir/', [editor::class,'subirImg'])->name('subirImg');
// Route::get('/proyecto/img/ver',[editor::class,'verImg']);
// app/Http/routes.php | app/routes/web.php
Route::get('/pdf',[PDFController::class,'createPDF'])->name('pdfD');
