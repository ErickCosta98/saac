@extends('layouts.plantillaL')

@section('contenido')

@section('busqueda')
<li class="nav-item">
  <form action="{{ route('welcome') }}" method="get">
  <input class="form-control" type="text" name="search" id="search" value="{{old('search')}}" />
  <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
</form></li>
@endsection
<div class="text-center mt-4">
    <h1 class="display-1  "> <strong>Proyectos Publicados</strong></h1>
</div>
<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4 mx-auto">
  @foreach ($proyectos as $proyecto)
  
  <div class="col"> 
    {{-- border-dark --}}
    <div class="card h-100 shadow-lg rounded-lg mt-5">
      <div class="card-header text-center">
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link active" aria-current="true" href="#"><h5 class="card-title">{{$proyecto->nombre}}</h5></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('verProyectoa', ['codigo'=>$proyecto->codigo]) }}" class="nav-link">Ver</a>
          </li>
        </ul>
      </div>   
      <div class="card-body">
        <p class="card-text " id="contenido">
          
     <p style="text-align:center"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"></span></span></p>
      <p>
        <span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">Docente(s)</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"></span></span><br>
       @foreach (DB::select("select users.*,users_proyectos.estatus from users inner join users_proyectos on users_proyectos.codigo = ? and users_proyectos.rol = 'Profesor' and users_proyectos.estatus != '0' and users_proyectos.fk_userid = users.id ", [$proyecto->codigo]) as $profesor)
      <span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">{{$profesor->nombre}}&nbsp;{{$profesor->apelPat}}&nbsp;{{$profesor->apelMat}}</span></span></span>
          @endforeach
        </p>
        <p>      
          <span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">Alumno(s)</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"></span></span><br>   
          @foreach (DB::select("select users.* from users inner join users_proyectos on users_proyectos.codigo = ? and users_proyectos.rol = 'Alumno' and users_proyectos.estatus != '0' and users_proyectos.fk_userid = users.id ", [$proyecto->codigo]) as $alumno)
          <span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">{{$alumno->nombre}}&nbsp;{{$alumno->apelPat}}&nbsp;{{$alumno->apelMat}}</span></span></span>
          @endforeach
        </p>
        </p>
        
      </div>
      <div class="card-footer text-muted">
        <?php  $claves = preg_split("/[\s,]+/", $proyecto->updated_at);
        echo 'Fecha de publicacion: '.$claves[0];
        ?>
      </div>
    </div>
  </div>
  @endforeach
  {{-- @for ($i = 1; $i <=12; $i++)
  
  @endfor --}}
    {{$proyectos->links()}}
  </div>
</div>
@endsection
@section('js')

<script>  
$(function(){
    
    @if(Session::has('alert'))
    Swal.fire({
        icon: 'warning',
        title: '{{ Session::get("alert") }}',
    })
    @endif
    @if(Session::has('success'))
    Swal.fire({
    icon: 'success',
    title: 'Listo! :',
    text: '{{ Session::get("success") }}',
})
@endif
});
    </script>
@endsection

