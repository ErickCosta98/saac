<?php

namespace App\Http\Controllers;

use App\Models\proyectos;
use App\Models\User;
use Illuminate\Http\Request;

class proyectosController extends Controller
{
    //
    public function index(Request $request){
        $proyectos = proyectos::all();
        return view('vistas.listaProyectos',compact('proyectos'));
    }

    public function dataProyectos(Request $request){
        return session('alumno');
        // return $request;
        session()->push($request->listAlumno);
        $alumnos = User::role('Alumno')->get();
        return view('vistas.registroProyecto',compact('alumnos'));
    }

    public function data(Request $request){
        // $user = User::where('usuario',$usuario)->role('Alumno')->value('Nombre');
        // return $request;
        return redirect(route('rProyecto'))->with('data',$request->usuario);
    }
    
}
