<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    {{-- <script src="{{ asset('src/js/jquery-3.6.0.min.js') }}"></script> --}}
    <script src="{{ asset('src/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/js/all.min.js') }}"></script>
    <script src="{{ asset('src/js/scripts.js') }}"></script>
    <script src="{{ asset('DataTables1/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('sweetalert2/src/SweetAlert.js') }}"></script> --}}



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('src/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('DataTables1/datatables.min.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
    {{-- <link rel="stylesheet" href="src/css/styles.css"> --}}
</head>

<body >
    <a class="ir-arriba"  javascript:void(0) title="Volver arriba">
        <span class="fa-stack">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
        </span>
      </a>
    <nav class="sb-topnav navbar navbar-expand navbar-dark  " style="background-color: #343a45; ">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-4" href="{{ route('welcome') }}"><h2>SAAC <small class="h6">UACH</small></h2></a>
        <!-- Sidebar Toggle-->
        @can('home')
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
        @endcan
       
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" >
            
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 " >
                @yield('busqueda')
                
                <li class="nav-item dropdown " >
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>
                        @can('home')
                            {{ Auth::user()->usuario }}
                        @endcan</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @endguest

                        @can('home')
                        <li><a class="dropdown-item" href="{{ route('userEdit1',Auth::user()->id) }}">Informacion</a></li>
                        <li><a class="dropdown-item" href="{{ route('password') }}">Contraseña</a></li>
                            {{-- <li><hr class="dropdown-divider" /></li> --}}
                            <li>
                                <form action="{{ route('logout') }}" method="post"> @csrf <a class="dropdown-item"
                                        onclick="this.closest('form').submit()">Logout</a></form>
                            </li>
                            
                        @endcan
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Navbar-->
        {{-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul> --}}
    </nav>
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav> --}}
    <div id="layoutSidenav">
    @can('home')

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion" style="background-color: #343a45;">
               
                <div class="sb-sidenav-menu">
                    
                        
                    <div class="nav">
                        @can('registroUsuario')
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                            Usuarios
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @can('userAdmin')
                                <a class="nav-link" href="{{ route('usuarios', ['listas'=>'Admin']) }}">Lista</a>
                                {{-- <form action="{{ route('usuarios.index') }}" method="get">
                                    <input type="hidden" name="listas" id="lista" value="Admin">
                                    <input type="hidden" name="busqueda" id="busqueda" value="">
                                    <button class="link" type="submit">Lista</button>
                                </form> --}}
                                @endcan
                                @can('registroUsuario')
                                <a class="nav-link" href="{{ route('usuarios', ['listas'=>'Alumno']) }}">Lista Alumnos</a>
                                <a class="nav-link" href="{{ route('usuarios', ['listas'=>'Profesor']) }}">Lista Profesores</a>
                                <a class="nav-link" href="{{ route('usuarios', ['listas'=>'Verificador']) }}">Lista Verificador</a>
                                <a class="nav-link" href="{{ route('userRegistro') }}" class="btn btn-primary">Nuevo registro</a>
                                @endcan
                            </nav>
                        </div>
                        @endcan
                        @can('userProyecto')
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                            <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                            proyectos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('proyectoList') }}"class="btn btn-primary">Lista proyectos</a>
                                @can('registroProyecto')
                                <a class="nav-link" href="{{ route('rProyecto') }}"class="btn btn-primary">Nuevo Proyecto</a>
                                @endcan
                                @if (Auth::user()->roles == 'Alumno'){
                                <a class="nav-link" href="{{ route('unirseProyecto') }}"class="btn btn-primary">unirse aun proyecto</a>
                                } 
                                    
                                @endif
                            </nav>
                        </div>
                            
                        @endcan
                        @can('userAdmin')
                            
                        {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Roles
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('roleList') }}"class="btn btn-primary">Lista de roles</a>
                            </nav>
                        </div> --}}
                        
                        @endcan
                    </div>
                   
                </div>
                
                <div class="sb-sidenav-footer">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">DESARROLLADO POR ERICK HERNANDEZ</div>
                       
                    </div>
                </div>
                
                
            </nav>
            
        </div>
    @endcan

        <div id="layoutSidenav_content">
            <main class="py-4">
                @yield('contenido')
            {{-- @dd($errors) --}}
            </main>
        </div>
    </div>
    <div class="goup">
    </div>
    @yield('js')
<script>
$(document).ready(function(){ irArriba(); }); //Hacia arriba

function irArriba(){
  $('.ir-arriba').click(function(){ $('body,html').animate({ scrollTop:'0px' },1000); });
  $(window).scroll(function(){
    if($(this).scrollTop() > 0){ $('.ir-arriba').slideDown(600); }else{ $('.ir-arriba').slideUp(600); }
  });
  $('.ir-abajo').click(function(){ $('body,html').animate({ scrollTop:'1000px' },1000); });
}
</script>
</body>
</html>