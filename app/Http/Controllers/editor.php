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
//    $dat = '<p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>';

//     // $dat =   $dat.;
//        foreach($profesor as $prf){
//             $dat=$dat.'<p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">'.$prf->nombre." ".$prf->apelPat." ".$prf->apelMat.'</span></span></span></p>';  
//         }
//         $dat=$dat.'<p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Estudiante(s)</span></span></span></p>';
//     foreach($alumno as $alm){
//             $dat=$dat.'<p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">'.$alm->nombre." ".$alm->apelPat." ".$alm->apelMat.'</span></span></span></p>' ;    
//     }
            // return $dat;
        session(['codigo' => $datos[0]->codigo]);
        return view('vistas.editor',compact('datos','profesor'));
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
