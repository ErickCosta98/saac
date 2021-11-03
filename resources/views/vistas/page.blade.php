@extends('layouts.plantillaL')

@section('contenido')
<div class="container shadow-lg border-0 rounded-lg mt-3">
    <a href="{{ route('pdfD', ['codigo'=>$proyecto->codigo]) }}" class="btn btn-outline-primary mt-3">Descargar PDF <i class="fas fa-file"></i></a>
    <div class="row">
      <h3 class="mt-2" style="text-align: center;">{{$proyecto->nombre}}</h3>
    </div> 
    <div class="m-4 ">
      <?php echo $proyecto->contenido ?>
    </div>
  <div class="mt-5">
    <br>
  </div>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto ">
          <div class="container-fluid px-4">
              <div class="d-flex align-items-center justify-content-between small">
                  <div class="text-muted">DEV: ISC. ERICK HERNANDEZ</div>
                 
              </div>
          </div>
      </footer>
  </div>
@endsection

