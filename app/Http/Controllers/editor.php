<?php

namespace App\Http\Controllers;

use App\Models\proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class editor extends Controller
{
    //

    public function show($id){
        $datos = DB::select('select contenido,codigo from proyectos where codigo = ?', [$id]);
        // return $datos;
        return view('vistas.editor',compact('datos'));
        // return $request;
    }
   
    public function guardar(Request $request){
        proyectos::where('codigo', $request->codigo)
        ->update(['contenido' => $request->area]);

        return back()->with('success','cambios guardados');
    }
}
