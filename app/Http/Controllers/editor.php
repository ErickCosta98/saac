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

    public function subirImg(Request $request){

        $request->upload->move(public_path('img'),$request->file('upload')->getClientOriginalName());
        echo json_encode(array('file_name' => $request->file('upload')->getClientOriginalName()));
    }

}
