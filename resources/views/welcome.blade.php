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
    <h1 class="display-1  ">Proyectos Publicados</h1>
</div>
<div class="container">
<div class="row row-cols-1 row-cols-md-3 g-4 mx-auto">
  @foreach ($proyectos as $proyecto)
  
  <div class="col"> 
    {{-- border-dark --}}
    <div class="card shadow-lg  rounded-lg mt-5">
      <div class="card-body">
        <h5 class="card-title">{{$proyecto->nombre}}</h5>
        <p class="card-text " id="contenido">
          
<p style="text-align:center"><span style="font-size:8pt"><span style="font-family:Arial"><span style="color:#000000">PROYECTOS DE INVESTIGACI&Oacute;N ACAD&Eacute;MICOS Y DE INTERVENCI&Oacute;N PARA LA MEJORA CONTINUA</span></span></span><span style="font-size:10pt"><span style="font-family:Arial"></span></span></p>
<p>
@foreach (DB::select("select users.*,users_proyectos.estatus from users inner join users_proyectos on users_proyectos.codigo = ? and users_proyectos.rol = 'Profesor' and users_proyectos.estatus != '0' and users_proyectos.fk_userid = users.id ", [$proyecto->codigo]) as $profesor)
<span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">{{$profesor->nombre}}&nbsp;{{$profesor->apelPat}}&nbsp;{{$profesor->apelMat}}</span></span></span>
          @endforeach
        </p>
        <p>         
          @foreach (DB::select("select users.* from users inner join users_proyectos on users_proyectos.codigo = ? and users_proyectos.rol = 'Alumno' and users_proyectos.estatus != '0' and users_proyectos.fk_userid = users.id ", [$proyecto->codigo]) as $alumno)
          <span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">{{$alumno->nombre}}&nbsp;{{$alumno->apelPat}}&nbsp;{{$alumno->apelMat}}</span></span></span>
          @endforeach
        </p>
        </p>
        <a href="{{ route('verProyectoa', ['codigo'=>$proyecto->codigo]) }}" class="btn btn-primary">ver</a>
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

