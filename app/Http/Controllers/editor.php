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
        $datos = DB::select('select contenido,codigo from proyectos where codigo = ?', [$id]);
        // return $datos[0]->codigo;
        session(['codigo' => $datos[0]->codigo]);
        return view('vistas.editor',compact('datos'));
        // return $request;
    }
   
    public function guardar(Request $request){
        proyectos::where('codigo', $request->codigo)
        ->update(['contenido' => $request->area]);

        return back()->with('success','cambios guardados');
    }

    public function subirImg(Request $request){
        
        $imagen = $request->file('upload')->store('public/img/'.session('codigo'));

      $url = Storage::url($imagen);
      $ul = new urlsModel();
      $ul->codigo = session('codigo');
      $ul->url = $url;
      $ul->save();
    return json_encode(array('url'=>$url));
    }

    public function verImg(){
        $urls = urlsModel::where('codigo',session('codigo'))->get();
        return view('vistas.browseimg',compact('urls'));
    }

}
