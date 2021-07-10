<?php

use App\Http\Controllers\editor;
use App\Http\Controllers\usuarios;
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
Route::view('/login', 'vistas.login')->name('login');
Route::post('/login',[usuarios::class,'authLog'])->name('loging');

Route::post('/logout',[usuarios::class,'logout'])->name('logout')->middleware('auth');

// Route::get('/usuarios',[usuarios::class,'userList'])->name('userList')->middleware('can:registroUsuario');
Route::resource('/usuarios', usuarios::class);

Route::get('/registro',[usuarios::class,'userRegistro'])->name('userRegistro')->middleware('can:registroUsuario');

Route::post('/usuarios/guardar',[usuarios::class,'gUser'])->name('userSave')->middleware('can:registroUsuario');

Route::get('/usuarios/edit/{id}',[usuarios::class,'userEdit'])->name('userEdit')->middleware('can:userAdmin');

Route::put('/usuarios/update/{user}',[usuarios::class,'userUpdate'])->name('userUpdate')->middleware('can:userAdmin');

Route::post('/usuarios/updatepassword',[usuarios::class,'userUpdatePassword'])->name('userUpdatepass')->middleware('can:userAdmin');


Route::get('/usuarios/userdelete/{id}/{listas}', [usuarios::class,'userDelete'])->name('userDelete')->middleware('can:userAdmin');

Route::get('/usuarios/useractive/{id}/{listas}', [usuarios::class,'userActive'])->name('userActive')->middleware('can:userAdmin');

// Route::post('/usuarios',[usuarios::class,'busqueda'])->name('userSearch')->middleware('can:registroUsuario');
Route::get('/roles', [usuarios::class,'roles'])->name('roleList')->middleware('can:userAdmin');

Route::post('/usuarios/rolespermisos/nuevoRol',[usuarios::class,'crearRol'])->name('nuevoRol')->middleware('can:userAdmin');
// Route::post('/usuarios/rolespermisos/nuevoPermiso',[usuarios::class,'crearPermiso'])->name('nuevoPermiso')->middleware('auth');
Route::get('/usuarios/rolespermisos/editRol/{id}',[usuarios::class,'editRol'])->name('roleEdit')->middleware('can:UserAdmin');
Route::post('/usuarios/rolespermisos/updateRol',[usuarios::class,'updateRol'])->name('updateRol')->middleware('can:UserAdmin');
