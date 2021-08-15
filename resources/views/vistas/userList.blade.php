@extends('layouts.plantillaL')


@section('contenido')
<div class="container shadow-lg border-0 rounded-lg mt-3" id="tb">
    <div class="row">
      <h3 class="mt-3" style="text-align: center;">Lista de usuarios</h3>
    </div>    
    <div class="row table-reponsive mx-auto" >
  <table class="table table-light table-striped" id="tabla" >
    <thead class="thead-light">
      <tr>
        <th>id</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Apellido paterno</th>
        <th>Apellido aterno</th>
        <th>Rol</th>
        <th>Modificar</th>
        <th>Modificar estado</th>  
   
      </tr>
    </thead>
    {{-- <tbody>
    @foreach ( $users as $user )
    <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->usuario}}</td>
    <td>{{$user->nombre}}</td>
    <td>{{$user->roles[0]->name}}</td>
    <td><a href="{{ route('userEdit', [$user->id,$_GET['listas']]) }}" class="btn btn-warning btn-block">Editar</a></td>  
    @if ($user->estatus == 1)
    <td><a id='btnBorrar' href="{{ route('userDelete',[$user->id,$_GET['listas']]) }}" class="btn btn-success btn-block" >Activo</a></td>
    @else
    <td><a id='btnActive' href="{{ route('userActive',[$user->id,$_GET['listas']]) }}" class="btn btn-danger btn-block" >Inactivo</a></td>
    @endif

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
  var lista = getQueryVariable('listas');
  var ruta = "usuarios/info?listas=" + lista ;
  // console.log(ruta)
 var tabla = $('#tabla').DataTable( {
        responsive:true,
        autoWidth:false,  
        language: {
            url: '{{ asset('DataTables1/es-mex.json') }}'
        },

        ajax:`{{ asset('${ruta}') }}`,
        columns:[
          {data:'id'},
          {data:'usuario'},
          {data:'nombre'},
          {data:'apelPat'},
          {data:'apelMat'},
          {data:'role'},
          {defaultContent:"<button type='button' class='btn btn-primary btn-xs ' id='btnedit'> Editar</button>"},
          {defaultContent:"<button type='button' class='btn btn-danger btn-xs ' id='btnEliminar'> Eliminar</button>"},
        ],
    } );
    
    $('#tabla').on('click', '#btnEliminar', function () //Al hacer click sobre el boton button.form de la linea de arriba
        {
           var data_form = tabla.row($(this).parents("tr")).data();
          //  console.log(data_form);
           
           var ruta = `usuarios/userdelete`;
          //  console.log(ruta)
           const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'estas seguro de elimiar esto?',
  text: "No se podra revertir",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
      type: "get",
      url: ruta,
      data: "&id=" + data_form['id'],
      success: function (data) {
        console.log(data)
        swalWithBootstrapButtons.fire(
      'Eliminado!',
    )    
    tabla.ajax.reload(null,false)
      }
    });
    
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',

    )
  }
})
           
    } );
    $('#tabla').on('click', '#btnedit', function () //Al hacer click sobre el boton button.form de la linea de arriba
        {
          
           var data_form = tabla.row($(this).parents("tr")).data();
           console.log(data_form);
           
           location.href = `usuarios/edit/${data_form['id']}/${getQueryVariable('listas')}`

           
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

    </script>
    <script>  
      $(function(){
          
          @if(Session::has('error'))
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: '{{ Session::get("error") }}',
              showConfirmButton: false,
              timer: 1500
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