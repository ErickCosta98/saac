@extends('layouts.plantillaL')
<script src="{{ asset('src/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('src/js/intro.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('src/js/introjs.min.css') }}">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/4.1.0/intro.min.js" integrity="sha512-vpRYyG0wwpTzFdMa1fWEV6GLWfJiiKG1W7dCPuIuvm2kbZMUA8jnokV84rdUft8AF6ih83/ItbmP/fDzNjVxsA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>     --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/4.1.0/introjs.min.css" integrity="sha512-631ugrjzlQYCOP9P8BOLEMFspr5ooQwY3rgt8SMUa+QqtVMbY/tniEUOcABHDGjK50VExB4CNc61g5oopGqCEw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@section('contenido')
<style>
    .container{
        margin-top: 20px;
    }
</style>
<div class="container shadow-lg border-0 rounded-lg mt-3">
  <a id="btnayuda" class="btn" name="ayuda" title="ayuda"><i class="fas fa-question-circle" ></i></a>
  {{-- <button  id="btnayuda" class="btn btn-secondary rounded-circle" name="ayuda" title="ayuda"><i class="fas fa-question-circle"></i></button> --}}
    <form  action="{{ route('saveContenido')}}" method="POST">
        @csrf
        <input type="hidden" name="codigo" value="{{$datos[0]->codigo}}">
        <br>
        <textarea class="" name="editor" id="editor" cols="80" rows="70">{{$datos[0]->contenido}}</textarea>
        <br>
        
       <img src=""  alt="" sizes="" srcset="">
    </form>
    @can('authProyectos')
    <div class="text-center ">
      <button id="btnap" class="btn btn-outline-success" value="{{$datos[0]->codigo}}">Aprobar</button>
   </div>
   <br>
    @endcan
    
    
</div>
<script>
    CKEDITOR.replace( 'editor',{
        height:500,
    } );
   
</script>
@endsection 

@section('js')
<script>
    $(document).ready(function () {
      
      $('#btnayuda').on('click', function () {
        // introJs().
        introJs().setOptions({
          nextLabel:'siguiente',
          doneLabel:'Listo',
          prevLabel:'Atras',
          showProgress:true,
           steps: [{
             title:'Guia',
    intro: "Esta es una guia rapida para agregar imagenes o insertar una nueva pagina"
  },{
    title:'Guia',
    intro: "Si necesitas agregar una imagen tienes 2 opciones"
  },
  {
    title:'Opcion 1',
    element: document.querySelector('#cke_70'),
    intro: "Aqui podras subir una foto desde tus archivos o desde una url"
  },{
    title:"Opcion 1",
    element: document.querySelector('#cke_70'),
    intro: '<img src="{{ asset("img/img1.png") }}"  width="350" alt="">',
    position: 'left'

  },{
    title:"Opcion 1",
    element: document.querySelector('#cke_70'),
    intro: 'Despues de subir la imagen necesitas aignar un tamaño',
    position: 'left'

  },{
    title:"Opcion 1",
    element: document.querySelector('#cke_70'),
    intro: '<img src="{{ asset("img/gif1.gif") }}"  width="350" alt="">',
    position: 'left'

  },
  {
    title:'Opcion 2',
    element: document.querySelector('#cke_77'),
    intro: "Aqui podras subir una foto desde una url"
  },{
    title:"Opcion 2",
    element: document.querySelector('#cke_77'),
    intro: '<img src="{{ asset("img/img2.png") }}"  width="350" alt="">',
    position: 'left'

  },{
    title:"Opcion 2",
    element: document.querySelector('#cke_77'),
    intro: 'Despues de subir la imagen necesitas aignar un tamaño',
    position: 'left'

  },{
    title:"Opcion 2",
    element: document.querySelector('#cke_77'),
    intro: '<img src="{{ asset("img/gif2.gif") }}"  width="350" alt="">',
    position: 'left'

  },
  {
    title:'Salto de pagina',
    element: document.querySelector('#cke_69'),
    intro: "Aqui podras añadir una nueva pagina"
  }
]
}).start();
        
      });
        $('#btnap').on('click', function () //Al hacer click sobre el boton button.form de la linea de arriba
          {
              var codigo = document.getElementById('btnap').value
// console.log(codigo)             
             var ruta = `{{ route('Aceptarproyecto') }}`;
            //  console.log(ruta)
             const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: 'Estas seguro de aprobar este proyecto?',
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
        data: "&codigo=" + codigo,
        success: function (data) {
          console.log(data)
          swalWithBootstrapButtons.fire(
        'Proyecto aceptado!',
      )    
        location.href = `{{ route('welcome') }}`;
      
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
            showConfirmButton: false,
            timer: 1500,
        })
        @endif
        @if(Session::has('success'))
        Swal.fire({
        icon: 'success',
        title: 'Listo!',
        text: '{{ Session::get("success") }}',
        showConfirmButton: false,
            timer: 1500,
    })
    @endif
    });
        </script>
@endsection
