<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\proyectos;
use Illuminate\Support\Facades\App;

class PDFController extends Controller
{
    public function __construct()
    {
         
    }
 
    public function createPDF(Request $request)
    {
    $contenido = proyectos::where('codigo',$request->codigo)->first();
    //  return $contenido;
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML($contenido->contenido);
    return $pdf->download($contenido->nombre.'.pdf');
    // return $pdf->stream($contenido->nombre.'.pdf');

    }
}
