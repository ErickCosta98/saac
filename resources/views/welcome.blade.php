@extends('layouts.plantillaL')




@section('contenido')
<div class="text-center mt-4">
    <h1 class="display-1  ">Proyectos Publicados</h1>
</div>
<div class="container">
<div class="row row-cols-1 row-cols-md-2 g-4 mx-auto">
  @for ($i = 1; $i <=10; $i++)
  <div class="col">
    <div class="card shadow-lg border-dark rounded-lg mt-5">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">

        <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">T&Iacute;TULO</span></span></span></p>
        
        <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">El t&iacute;tulo indica de forma breve y concreta de lo que trata todo el art&iacute;culo, tiene que ser lo m&aacute;s espec&iacute;fico posible.</span></span></span></p>
        
        <hr />
        <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Nombre completo del docente 1</span></span></span></p>
        
        <p><span style="font-size:10pt"><span style="font-family:Arial"><span style="color:#000000">Nombre (s) completo (s) del (los) estudiante (s) 2</span></span></span></p>
        
      </div>
    </div>
  </div>
  @endfor
    
  </div>
</div>
@endsection