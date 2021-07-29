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
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    {{-- <script src="{{ asset('sweetalert2/src/SweetAlert.js') }}"></script> --}}



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('src/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
    {{-- <link rel="stylesheet" href="src/css/styles.css"> --}}
</head>

<body >
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
            {{-- <div class="input-group  inline">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div> --}}
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 " >
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
                                <a class="nav-link" href="{{ route('usuarios.index', ['listas'=>'Admin']) }}">Lista</a>
                                {{-- <form action="{{ route('usuarios.index') }}" method="get">
                                    <input type="hidden" name="listas" id="lista" value="Admin">
                                    <input type="hidden" name="busqueda" id="busqueda" value="">
                                    <button class="link" type="submit">Lista</button>
                                </form> --}}
                                @endcan
                                @can('registroUsuario')
                                <a class="nav-link" href="{{ route('usuarios.index', ['listas'=>'Alumno']) }}">Lista Alumnos</a>
                                <a class="nav-link" href="{{ route('usuarios.index', ['listas'=>'Profesor']) }}">Lista Profesores</a>
                                <a class="nav-link" href="{{ route('usuarios.index', ['listas'=>'Verificador']) }}">Lista Verificador</a>
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
                                <a class="nav-link" href="{{ route('proyectos.index') }}"class="btn btn-primary">Lista proyectos</a>
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

    @yield('js')

</body>
</html>
