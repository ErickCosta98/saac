<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class editor extends Controller
{
    //

    public function show(Request $request){
        $datos = $request->area;
        return view('vistas.editor2',compact('datos'));
        // return $request;
    }
   
}
