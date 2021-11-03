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
        $proyecto->contenido = '
        <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>RESUMEN</strong></span></span></span></p>
        
        <p>&nbsp;</p>
        
        <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Texto...El resumen proporciona informaci&oacute;n del estudio y facilita al lector conocer la tem&aacute;tica que se aborda. El resumen debe indicar la problem&aacute;tica, el objetivo general, la pregunta central, la justificaci&oacute;n y las conclusiones; todo ello de manera muy breve y concreta. Este apartado se redacta al concluir con la investigaci&oacute;n.</span></span></span></p>
        
        <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">PALABRAS CLAVE: Palabra 1; palabra 2; palabra 3; palabra 4; palabra 5.</span></span></span></p>
        
        <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Las palabras clave son frases cortas que ayudan a clasificar el trabajo de acuerdo a su contenido.</span></span></span></p>
        
        <p>&nbsp;</p>
        
        <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>ABSTRACT</strong></span></span></span></p>
        
        <p>&nbsp;</p>
        
        <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Texto... El abstract es el resumen escrito en ingl&eacute;s.</span></span></span></p>
        
        <p>&nbsp;</p>
        
        <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"><strong>KEYWORDS</strong></span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">: Word 1; word 2; word 3;word4.</span></span></span></p>
        
        <p>&nbsp;</p>
        
        <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Las keywords son las palabras clave escritas en ingl&eacute;s.</span></span></span></p>
        
        <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Docente - investigador de la Universidad de Los Altos de Chiapas.&nbsp;</span></span></span></p>
        
        <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">&nbsp;Estudiantes del CBTis 92 en</span></span></span></p>
        
        <p>&nbsp;</p>
        
        <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>
        
        <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>
        
        <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
        
        <p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>
        
        <p><strong>INTRODUCCI&Oacute;N</strong></p>
        
        <p>La introducci&oacute;n describe lo que trata el art&iacute;culo de acuerdo al t&iacute;tulo y al planteamiento del problema, con la finalidad de adentrarse en el estudio. Sirve para resaltar el tema que se est&aacute; abordando. La introducci&oacute;n se redacta al terminar de escribir el art&iacute;culo y antes del resumen y las palabras clave.</p>
        
        <p>PROBLEM&Aacute;TICA</p>
        
        <p>La problem&aacute;tica se refiere a describir lo que est&aacute; pasando en relaci&oacute;n con una situaci&oacute;n, con una persona o con una instituci&oacute;n; es narrar los hechos que caracterizan esa situaci&oacute;n, mostrando sus implicaciones.</p>
        
        <p><strong>PREGUNTA DE NVESTIGACI&Oacute;N</strong></p>
        
        <p>La pregunta de investigaci&oacute;n debe resumir lo que habr&aacute; de ser investigado, deben ser claras y concretas, las cuales representan el qu&eacute; del estudio.</p>
        
        <p>Los requisitos que debe cumplir la pregunta de investigaci&oacute;n:</p>
        
        <ul>
            <li>Que no se conozca la respuesta (si se conoce, no valdr&iacute;a la pena realizar el estudio).</li>
            <li>Que pueda responderse con evidencia&nbsp;&nbsp; &nbsp;emp&iacute;rica&nbsp;&nbsp; &nbsp;(datos</li>
            <li>observables o medibles).</li>
            <li>Que implique usar medios &eacute;ticos.</li>
            <li>Que sea clara.</li>
            <li>Que el conocimiento que se obtenga sea sustancial (que aporte conocimientos a un campo de estudio).</li>
        </ul>
        
        <p><strong>OBJETIVO DE INVESTIGACI&Oacute;N</strong></p>
        
        <p>El objetivo es la gu&iacute;a de estudio, establece lo que se pretende con el proyecto de investigaci&oacute;n, este debe expresarse con claridad y ser concreto, medible, apropiado y realista; hay que tenerlo presente durante todo el desarrollo.</p>
        
        <p><strong>JUSTIFICACI&Oacute;N</strong></p>
        
        <p>La justificaci&oacute;n indica las motivaciones que impulsan a plantear la investigaci&oacute;n y por qu&eacute; es relevante investigar ese tema. La justificaci&oacute;n indica el para qu&eacute; o por qu&eacute; debe efectuarse la investigaci&oacute;n, se tiene que explicar por qu&eacute; es conveniente llevar a cabo la investigaci&oacute;n y cu&aacute;les son los beneficios que se derivar&aacute;n de ella.</p>
        
        <p>&nbsp;</p>
        
        <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>
        
        <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>
        
        <div style="page-break-after:always"><span style="display:none">&nbsp;</span></div>
        
        <p style="text-align:right"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000"> Edici&oacute;n 7, febrero 2021.</span></span></span></p>
        
        <p style="text-align:center"><strong>REFERENTES TE&Oacute;RICOS</strong></p>
        
        <p>Se basan en la informaci&oacute;n documental que fundamentan la investigaci&oacute;n. El plantear los referentes te&oacute;ricos se da proceso de inmersi&oacute;n en el conocimiento existente y disponible que debe estar vinculado con nuestro planteamiento del problema.</p>
        
        <p style="text-align:center"><strong>METODOLOG&Iacute;A</strong></p>
        
        <p>La metodolog&iacute;a presenta informaci&oacute;n clara, concisa y concreta de las t&eacute;cnicas o procedimientos utilizados, as&iacute; como las condiciones bajo las cuales se llev&oacute; a cabo el estudio. En este apartado se colocan las fotografias c&oacute;rrespondientes al realizar la investigaci&oacute;n. La metodolog&iacute;a responde el &iquest;C&oacute;mo se realiz&oacute; la investigaci&oacute;n?</p>
        
        <p style="text-align:center"><strong>RESULTADOS</strong></p>
        
        <p>Los resultados son las observaciones que se realizan en todo el proceso de la investigaci&oacute;n, las cuales se pueden presentar con diagramas, cuadros, tablas o gr&aacute;ficas. El an&aacute;lisis debe ser claro y guardar relaci&oacute;n con el planteamiento del problema (problem&aacute;tica, objetivos, preguntas y justificaci&oacute;n). Agregar evidencias de la investigaci&oacute;n (fotografias, diagramas, transcripciones, etc.)</p>
        
        <p style="text-align:center"><strong>CONCLUSIONES</strong></p>
        
        <p>Las conclusiones describen las respuestas a la pregunta de investigaci&oacute;n de acuerdo a los resultados.</p>
        
        <p style="text-align:center"><strong>FUENTES DE CONSULTA</strong></p>
        
        <p>Las fuentes de consulta son los documentos (digitales o fisicos) que se revisaron para obtener la informaci&oacute;n correspondiente, estos deben ser citados en el formato APA.</p>
        
        <p>Ejemplo de un libro:</p>
        
        <p>Mor&aacute;n, G., y Alvarado, D. (2010). M&eacute;todos &nbsp;&nbsp; &nbsp;de&nbsp;&nbsp; &nbsp;investigaci&oacute;n. M&eacute;xico: Pearson.</p>
        
        <p>Ejemplo de un art&iacute;culo cient&iacute;fico:</p>
        
        <p>Navaridas, F., y Jim&eacute;nez, M. (2016). Concepciones de los estudiantes sobre la eficacia de los ambientes de aprendizaje universitarios. Revista&nbsp;&nbsp; &nbsp;de&nbsp;&nbsp; &nbsp;Investigaci&oacute;n Educativa, Vol. 34, N&uacute;m. 2, pp. 503-519.</p>
        
        <p>Cualquier duda u observaci&oacute;n favor de notificar al correo:</p>
        
        <p>proyectos.academicos@uach.edu.mx</p>
        
        <p style="text-align:center"><strong>OBSERVACIONES DE LA ESTRUCTURA DEL ART&Iacute;CULO:</strong></p>
        
        <p>S&oacute;lo la primera hoja es a una columna, todas las dem&aacute;s a dos columnas.</p>
        
        <p>La extensi&oacute;n m&iacute;nima de cada art&iacute;culo ser&aacute; de 6 cuartillas y la extensi&oacute;n m&aacute;xima de 8 cuartillas.</p>
        
        <p>&nbsp;</p>
        
        <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de recepci&oacute;n de art&iacute;culos: agosto 2020 - diciembre de 2020</span></span></span></p>
        
        <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Fecha de publicaci&oacute;n de art&iacute;culos: febrero de 2021</span></span></span></p>
        
        ';
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
        ->where('estatus','1')->where('nombre', 'LIKE', "%{$request->search}%")->paginate(9);
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
