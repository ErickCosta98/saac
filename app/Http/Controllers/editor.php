<?php

namespace App\Http\Controllers;

use App\Models\proyectos;
use App\Models\urlsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class editor extends Controller
{
    //

    public function show($id){
        $datos = DB::select('select contenido,codigo,nombre from proyectos where codigo = ?', [$id]);
        $profesor = DB::select('Select users.* from users inner join users_proyectos on users_proyectos.codigo = ? and rol ="Profesor" and users.id = users_proyectos.fk_userid',[$id]);
        $alumno = DB::select('Select users.* from users inner join users_proyectos on users_proyectos.codigo = ? and rol ="Alumno" and users.id = users_proyectos.fk_userid',[$id]);
        // return $datos[0]->codigo;
        $dat = '<div id="dvs">&nbsp;</div>';

        $dat =   $dat.'<p style="text-align:center"><strong><span style="font-size:18px"><span style="font-family:Arial"><span style="color:#000000">'.$datos[0]->nombre.'</span></span></span></strong></p>

            
    <hr/><p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Docente(s)</span></span></span></p>';
       foreach($profesor as $prf){
            $dat=$dat.'<p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">'.$prf->nombre." ".$prf->apelPat." ".$prf->apelMat.'</span></span></span></p>';  
        }
        $dat=$dat.'<p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Estudiante(s)</span></span></span></p>';
    foreach($alumno as $alm){
            $dat=$dat.'<p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">'.$alm->nombre." ".$alm->apelPat." ".$alm->apelMat.'</span></span></span></p>' ;    
    }
        $dat = $dat.'<div id="dvs">&nbsp;</div>';
            // return $dat;
            $a = mb_split('<div id="dvs">&nbsp;</div>',$datos[0]->contenido);
            // return $a;
        $contenido = $a[0].$dat.$a[2];
        session(['codigo' => $datos[0]->codigo]);

        return view('vistas.editor',compact('contenido'));
        // return $request;
    }
   
    public function guardar(Request $request){
        proyectos::where('codigo', $request->codigo)
        ->update(['contenido' => $request->editor]);

        return back()->with('success','cambios guardados');
    }
    // public function subirImg(Request $request){
        
    //     $imagen = $request->file('upload')->store('public/img/'.session('codigo'));

    //   $url = Storage::url($imagen);
    //   $ul = new urlsModel();
    //   $ul->codigo = session('codigo');
    //   $ul->url = $url;
    //   $ul->save();
    // return json_encode(array('url'=>$url));
    // }

    // public function verImg(){
    //     $urls = urlsModel::where('codigo',session('codigo'))->get();
    //     return view('vistas.browseimg',compact('urls'));
    // }

}
