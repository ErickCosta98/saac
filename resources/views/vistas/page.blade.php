@extends('layouts.plantillaL')

@section('contenido')
<div class="container shadow-lg border-0 rounded-lg mt-3">
    <a href="{{ route('pdfD', ['codigo'=>$proyecto->codigo]) }}" class="btn btn-outline-primary mt-3">Descargar PDF <i class="fas fa-file"></i></a>
    <div class="row ">
      <h3 class="mt-3" style="text-align: center;">{{$proyecto->nombre}}</h3>
      <?php echo $proyecto->contenido ?>
    </div> 
  <div class="mt-4">

  </div>
    </div>
  </div>
@endsection

