<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\proyectos;
use App\Models\User;
use App\Models\users_proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class proyectosController extends Controller
{
    //
    public function index(Request $request){
        $proyectos = DB::select('select proyectos.* from proyectos inner join users_proyectos on users_proyectos.fk_userid = ? and proyectos.id=users_proyectos.fk_proyectoid', [Auth::user()->id]);
        return view('vistas.listaProyectos',compact('proyectos'));
    }

    public function regProyecto(Request $request){
        

        // return Auth::user()->roles[0]->name;
        $proyecto = new proyectos();
        $proyecto->nombre = $request->nombre;
        $prefix = strtoupper(substr(trim($request->nombre),1,3));
        $proyecto->codigo = Helper::IDGenerator(new proyectos,'codigo', 4 , $prefix);
        $proyecto->save();
        if (!Storage::disk('public')->exists('pdf/'.$proyecto->codigo)) {
            Storage::disk('public')->makeDirectory('pdf/'.$proyecto->codigo);
        }
        $usp = new users_proyectos();
        $usp->fk_userid = Auth::user()->id;
        $usp->fk_proyectoid = $proyecto->id;
        $usp->rol = Auth::user()->roles[0]->name;
        $usp->save();
        return redirect()->route('rProyecto')->with('success',$proyecto->codigo);
    }
    
}
