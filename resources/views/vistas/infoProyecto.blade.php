@extends('layouts.plantillaL')

@section('contenido')
<div class="container ">
    <div class="row ">
        <div class="card mx-auto shadow-lg border-0 rounded-lg mt-3">
            <div class="card-header mt-3">
                <h4 class="text-center font-weight-light my-2">Informacion de proyecto</h4>
            </div>
            <div class="card-body">
                    <form class="mb-3" action="{{ route('einfoProyecto') }}" method="post">
                        @csrf
                        <input id="codigo" type="hidden" name="codigo" value="{{$datos[0]->codigo}}">
                    <div class="col-sm-8 mx-auto">
                        <label for="nombre">Informacion </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$datos[0]->nombre}}">
                        @error('nombre')
                            {{$message}}
                        @enderror
                        <br>
                        <div class="form-floating">
                          <textarea class="form-control" placeholder="Descripcion.." id="floatingTextarea2" name='descripcion' style="height: 100px">{{$datos[0]->descripcion}}</textarea>
                          <label for="floatingTextarea2">Descripcion del proyecto</label>
                        </div>
                        <br>
                        <div class="text-center">
                        <input class="btn btn-primary" type="submit" value="guardar">
                        </div>
                    </div>
                    </form>
                    <table class="table table-light table-striped" id="tabla">
                        <thead class="thead-light">
                          <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Rol</th>
                            <th>acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ( $alumnos as $proyecto )
                        @if ($proyecto->id != Auth::user()->id)
                        <tr>
                          <td>{{$proyecto->nombre}}</td>
                          <td>{{$proyecto->apelPat." ".$proyecto->apelMat}}</td>
                          <td>{{$proyecto->rol}}</td>
                          @if ($proyecto->estatus == '2')
                          <td>
                              <a href="{{ route('aceptarAlumno', ['id'=>$proyecto->id,'codigo'=>$datos[0]->codigo]) }}" class="btn btn-primary">Aceptar</a>
                              <button value="{{'id='.$proyecto->id.'&codigo='.$datos[0]->codigo}}" id="btnEliminar" class="btn btn-danger">No aceptar</button>
                          </td> 
                          @elseif ($proyecto->estatus == '1')
                              <td><button value="{{'id='.$proyecto->id.'&codigo='.$datos[0]->codigo}}" id="btnEliminar" class="btn btn-danger">Eliminar</button></td>
                          @endif
                          @if ($proyecto->estatus == '0')
                          <td><a href="{{ route('aceptarAlumno', ['id'=>$proyecto->id,'codigo'=>$datos[0]->codigo,'res'=>true]) }}" class="btn btn-primary">Restablecer</a></td>
                              
                          @endif
                        @endif
                        @endforeach
                            </tr>
                        </tbody>
                      </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script >
    $(document).ready(function () {
        $('#tabla').on('click', '#btnEliminar', function () //Al hacer click sobre el boton button.form de la linea de arriba
        {
            ruta = '<?php echo route('noaceptarAlumno'); ?>'
           console.log(ruta);
          var data = document.getElementById('btnEliminar').value
           console.log(data)
           const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'No aceptar',
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
      data: data,
      success: function (data) {
        console.log(data)
        swalWithBootstrapButtons.fire(
      'Eliminado!',
    )    
    $("#tabla").load(location.href + " #tabla");
   
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
    });
</script>
<script>  
$(function(){
    
    @if(Session::has('error'))
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '{{ Session::get("error") }}',
    })
    
    @endif
    @if(Session::has('success'))
    Swal.fire({
    icon: 'success',
    title: 'Listo! :',
    text: '{{ Session::get("success") }}',
    showConfirmButton: false,
    timer: 1500

})
@endif
});
    </script>
@if (Session::has('error'))
    {{Session::forget('error')}}
@endif

@endsection