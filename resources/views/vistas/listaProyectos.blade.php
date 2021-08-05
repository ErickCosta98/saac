@extends('layouts.plantillaL')

@section('contenido')
<div class="container shadow-lg border-0 rounded-lg mt-3">
    <div class="row ">
      <h3 class="mt-3" style="text-align: center;">Lista de proyectos</h3>
    </div> 
    @role('Alumno|Profesor')
    <form class="col-3 mb-4" action="{{ route('unirseP') }}" method="post">
      @csrf
      <label for="">Unirse a un proyecto</label>
      <div class="input-group">
        <input type="text" class="form-control" name="codigo" aria-label="Unirse a un proyecto">
        <button class="btn btn-outline-secondary" type="submit">unirse</button>
      </div>
      @error('codigo'){{$message}}@enderror
    </form>
  @endrole   
    <div class="row table-reponsive mx-auto mb-3" > 
  <table class="table table-light " id="tabla">
    <thead class="thead-light">
      <tr>
        <th>codigo</th>
        <th>Nombre</th>
        <th>acciones</th>
        {{-- @can('authProyectos')
        <th>Estado</th>     
        @endcan --}}
      </tr>
    </thead>
    {{-- <tbody>
    @foreach ( $proyectos as $proyecto )
    <tr>
    <td>{{$proyecto->codigo}}</td>
    <td>{{$proyecto->nombre}}</td>
    <td><a href="{{ route('editProyecto', $proyecto->codigo) }}" class="btn btn-primary">Contenido</a>
      @hasanyrole('Profesor|Verificador|Admin')
      <a href="{{ route('infoProyecto', $proyecto->codigo) }}" class="btn btn-warning">informacion</a>
      @endhasanyrole
      </td> 
    @can('authProyectos')
    <td><a ' href="" class="btn btn-success btn-block" >Aprobar</a></td>   
    @endcan
    @endforeach
        </tr>
    </tbody> --}}
  </table>
  <div class="mt-4"></div>
    </div>
  </div>
@endsection

@section('js')
<script>  
  $(document).ready(function() {
    var ruta = "proyectos/lista"  ;
    // console.log(ruta)
   var tabla = $('#tabla').DataTable( {
          responsive:true,
          autoWidth:false,  
          language: {
              url: 'DataTables/es-mx.json'
          },
  
          ajax:`{{ asset('${ruta}') }}`,
          columns:[
            {data:'codigo'},
            {data:'nombre'},
            {defaultContent:"<button  type='button' class='btn btn-primary' id='btnCont'>Contenido</button>@hasanyrole('Profesor|Verificador|Admin')<button  type='button' id='btnInfo' class='btn btn-warning'>informacion</a>@endhasanyrole"},
          ],
      } );
      
     
      $('#tabla').on('click', '#btnCont', function () //Al hacer click sobre el boton button.form de la linea de arriba
          {
            
             var data_form = tabla.row($(this).parents("tr")).data();
             console.log(data_form);
             
             location.href = `proyecto/editor/${data_form['codigo']}`;
  
             
      } );
      $('#tabla').on('click', '#btnInfo', function () //Al hacer click sobre el boton button.form de la linea de arriba
          {
            
             var data_form = tabla.row($(this).parents("tr")).data();
             console.log(data_form);
             
             location.href = `proyecto/informacion/${data_form['codigo']}`;
  
             
      } );
  } );
  function getQueryVariable(variable) {
     var query = window.location.search.substring(1);
     var vars = query.split("&");
     for (var i=0; i < vars.length; i++) {
         var pair = vars[i].split("=");
         if(pair[0] == variable) {
             return pair[1];
         }
     }
     return false;
  }
  
      </script>    <script>  
      $(function(){
          
          @if(Session::has('error'))
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: '{{ Session::get("error") }}',
              showConfirmButton: false,
              timer: 1500,
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