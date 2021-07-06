<?php

use App\Http\Controllers\editor;
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

Route::get('/', function () {
    return view('vistas.login');
});
Route::get('/registro', function () {
    return view("vistas.registro");
});

Route::get('/editor', function () {
    return view("vistas.editor");
});

Route::post('editor',[editor::class,'show'])->name("editor.show");

Route::post('editor/mostrar/',[editor::class,'mostrar'])->name("editor.mostrar");
