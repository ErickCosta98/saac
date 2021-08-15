<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\proyectos;
use App\Models\User;
use App\Models\users_proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException as ValidationValidationException;


class proyectosController extends Controller
{
    //
    public function index()
    {
        $user = User::find(Auth::user()->id);
       
        if ($user->hasRole('Verificador|Admin')) {
            $proyectos = proyectos::select('codigo','nombre')->where('estatus','0');
            return datatables()->of($proyectos)->toJson();
        }
        $proyectos = DB::select("select proyectos.codigo, proyectos.nombre from proyectos inner join users_proyectos on users_proyectos.fk_userid = ? and users_proyectos.estatus = '1' and proyectos.estatus = '0' and proyectos.id=users_proyectos.fk_proyectoid", [Auth::user()->id]);
        return datatables()->of($proyectos)->toJson();

    }

    public function regProyecto(Request $request)
    {
        $request->validate(['nombre' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        // return Auth::user()->roles[0]->name;
        $proyecto = new proyectos();
        $proyecto->nombre = $request->nombre;
        $prefix = strtoupper(substr(trim($request->nombre), 1, 3));
        $proyecto->codigo = Helper::IDGenerator(new proyectos, 'codigo', 4, $prefix);
        $proyecto->descripcion = $request->descripcion;
        $proyecto->save();
        // if (!Storage::disk('public')->exists('pdf/' . $proyecto->codigo)) {
        //     Storage::disk('public')->makeDirectory('pdf/' . $proyecto->codigo);
        // }
        $usp = new users_proyectos();
        $usp->fk_userid = Auth::user()->id;
        $usp->fk_proyectoid = $proyecto->id;
        $usp->rol = Auth::user()->roles[0]->name;
        $usp->codigo = $proyecto->codigo;
        $usp->save();
        return redirect()->route('proyectoList')->with('success', $proyecto->codigo);
    }

    public function informacionEdit(Request $request)
    {
        $request->validate(['nombre' => ['required', 'string', 'min:8', 'max:255'],
    ]);
        proyectos::where('codigo',$request->codigo)->update(['nombre'=>$request->nombre,'descripcion'=>$request->descripcion]);
        return back()->with('success','cambios guardados');
    }
    public function informacion($id)
    {
        $user = User::find(Auth::user()->id);
       
        if ($user->hasRole('Admin')) {
            $alumnos = DB::select("select users.nombre,users.apelPat,users.apelMat,users.id,users_proyectos.rol,users_proyectos.estatus from users inner join users_proyectos on users_proyectos.codigo = ?   and users_proyectos.fk_userid = users.id ", [$id]);
        //    return $alumnos;
        $datos = DB::select('select nombre,codigo,descripcion from proyectos where codigo = ?', [$id]);
        // return strlen( $datos[0]->descripcion);
        if(strlen( $datos[0]->descripcion) < 1 || strlen(trim($datos[0]->descripcion)) < 1  ){
            // return strlen( $datos[0]->descripcion);
            session(['error'=>'Porfavor agrega una descripcion']);
        return view('vistas.infoProyecto', compact('alumnos', 'datos'));
        }
        return view('vistas.infoProyecto', compact('alumnos', 'datos'));
        }   
        $alumnos = DB::select("select users.nombre,users.apelPat,users.apelMat,users.id,users_proyectos.rol,users_proyectos.estatus from users inner join users_proyectos on users_proyectos.codigo = ?  and users_proyectos.estatus != '0' and users_proyectos.fk_userid = users.id ", [$id]);
        //    return $alumnos;
        $datos = DB::select('select nombre,codigo,descripcion from proyectos where codigo = ?', [$id]);
        // return $datos[0]->codigo;
        if(strlen($datos[0]->descripcion) == 0 || strlen(trim($datos[0]->descripcion)) == 0 ){
            session(['error'=>'Porfavor agrega una descripcion']);
        return view('vistas.infoProyecto', compact('alumnos', 'datos'));
        }
        return view('vistas.infoProyecto', compact('alumnos', 'datos'));
    }

    public function unirseProyecto(Request $request)
    {
        $request->validate(['codigo' => ['required', 'string', 'min:14'],
    ]);
    $pro = users_proyectos::where('codigo',$request->codigo)->where('fk_userid',Auth::user()->id)->get();
    if(count($pro) > 0){throw ValidationValidationException::withMessages([
        'codigo' => 'Ya estas en espera de aceptacion',
    ]); }
        $proyecto = DB::select('select * from proyectos where codigo = ?', [$request->codigo]);
        // return count($proyecto);
        if (count($proyecto) == 0) {
            throw ValidationValidationException::withMessages([
                'codigo' => 'Codigo no valido',
            ]);
        }
        $usp = new users_proyectos();
        $usp->fk_userid = Auth::user()->id;
        $usp->fk_proyectoid = $proyecto[0]->id;
        $usp->rol = Auth::user()->roles[0]->name;
        $usp->codigo = $proyecto[0]->codigo;
        $usp->estatus = '2';
        $usp->save();

        return redirect('/proyectos')->with('success','en espera de aceptacion');
    }

    public function aceptarAlumno(Request $request)
    { 
        if(isset($request->res)){
            users_proyectos::where('fk_userid',$request->id)->where('codigo', $request->codigo)->update(['estatus' => '2']);

            return back();            
        }
        // return $request;
        users_proyectos::where('fk_userid',$request->id)->where('codigo', $request->codigo)->update(['estatus' => '1']);

        return back();
    }

    public function noaceptarAlumno(Request $request)
    { 
        // return $request;
        users_proyectos::where('fk_userid',$request->id)->where('codigo', $request->codigo)->update(['estatus' => '0']);

        return back();
    }

    public function aceptarProyecto(Request $request){
         $datos = DB::select('select contenido,codigo,nombre from proyectos where codigo = ?', [$request->codigo]);
        $profesor = DB::select('Select users.* from users inner join users_proyectos on users_proyectos.codigo = ? and rol ="Profesor" and users.id = users_proyectos.fk_userid',[$request->codigo]);
        $alumno = DB::select('Select users.* from users inner join users_proyectos on users_proyectos.codigo = ? and rol ="Alumno" and users.id = users_proyectos.fk_userid',[$request->codigo]);
        // return $datos[0]->codigo;

        // return Helper::pregDoc($datos[0]->contenido);
        $dat = '';

        $dat =   $dat.'<p style="text-align:center"><strong><span style="font-size:18px"><span style="font-family:Arial"><span style="color:#000000">'.$datos[0]->nombre.'</span></span></span></strong></p>

            
    <hr/><p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Docente(s)</span></span></span></p>';
       foreach($profesor as $prf){
            $dat=$dat.'<p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">'.$prf->nombre." ".$prf->apelPat." ".$prf->apelMat.'</span></span></span></p>';  
        }
        $dat=$dat.'<p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Estudiante(s)</span></span></span></p>';
    foreach($alumno as $alm){
            $dat=$dat.'<p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">'.$alm->nombre." ".$alm->apelPat." ".$alm->apelMat.'</span></span></span></p>' ;    
    }
        // $dat = $dat.'<div id="dvs">&nbsp;</div>';
        $contenido = $dat.$datos[0]->contenido;
        proyectos::where('codigo',$request->codigo)->update(['estatus'=>'1','contenido'=>$contenido]);


        return response()->json('Aceptado');

    }
    public function verProyectosa(Request $request){
        // return $request;
        if(isset($request->search)){
            $proyectos = proyectos::query()
        ->where('nombre', 'LIKE', "%{$request->search}%")->paginate(9);
        return view('welcome',compact('proyectos'));
        
    }

        $proyectos = proyectos::where('estatus','1')->select('codigo','nombre','updated_at')->paginate(9);
        // return $proyectos;
        return view('welcome',compact('proyectos'));
    }
    public function verProyectopage($codigo){
        
        $proyecto = proyectos::where('codigo',$codigo)->first();
        // return $proyecto;
        return view('vistas.page',compact('proyecto'));


    }
}
