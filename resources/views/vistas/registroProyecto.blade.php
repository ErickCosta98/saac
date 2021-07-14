@extends('layouts.plantillaL')

@section('contenido')
<div class="container">
    <div class="row ">
        <div class="card mx-auto">
            <div class="card-header">
                <h4 class="text-center font-weight-light my-2">Nuevo usuario</h4>
            </div>
            <div class="card-body">
                    <form action="{{ route('nuevoProyecto') }}" method="post">
                        @csrf
                    <div class="col-sm-8 mx-auto">
                        <label for="nombre">Nombre de proyecto</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                        <ul id="lista"  class="list-group">
                        </ul>
                        <input type="submit" value="guardar">
                    </div>
                    
                    </form>
                    <div class="form-group col-sm-4 mx-auto">
                        <table class="table table-light" id="tabla">
                            <thead class="thead-light">
                                <tr>
                                <th>Nombre</th>
                                <th>usuario</th>
                                <th>agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ( $alumnos as $item)
                                <tr>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->usuario}}</td>
                                    <td><button id="agregar" value="{{$item->usuario}}" class="btn btn-primary btnAG " onclick=" txt = document.getElementById('lista'); txt.innerHTML+='<li><input type=hidden name=alumnos[] value='+this.value+'>'+this.value+'</li>';" >agregar</button></td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        {{-- <button id="agregar" value="{{$item->id}}" class="btn btn-primary btnAG >agregar</button> --}}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script>  
$(document).ready(function() {
    $('#tabla').DataTable( {
        language: {
            url: '../DataTables/es-mx.json'
        },
        "aLengthMenu": [[2, 5], [2, 5]],
        "iDisplayLength": 2,
    } );
    $('.btnAG').on('click',function(){
        
    });
    // const boton = document.querySelector("#agregar");
// Agregar listener
// boton.addEventListener("click", function (evento) {
// 	// Aquí todo el código que se ejecuta cuando se da click al botón
// 	// El evento del click
//     var elementos = document.getElementById('agregar').value
//     console.log(elementos);
// 	console.log("El evento es: ", evento);
// 	// Para acceder al botón usamos this
// 	// Por ejemplo cambiemos el texto
// });
} );
    </script>
@endsection