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
        // return $request;
        $alumnos = User::role('Alumno')->get();
        return view('vistas.registroProyecto',compact('alumnos'));
    }

    public function regProyecto(Request $request){
        return $request;
    }
    
}
