@extends('layouts.plantilla')
@section('contenido')
<div id="layoutAuthentication">
  <div id="layoutAuthentication_content">
      <main>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-5">
                      <div class="card shadow-lg border-0 rounded-lg mt-5">
                          <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                          <div class="card-body">
                            <form action="{{ route('loging') }}" method="POST">
                              @csrf
                                  <div class="form-floating mb-3">
                                      <input class="form-control" id="usuario" name="usuario" type="text" placeholder="usuario" value="{{old('usuario')}}" />
                                      <label for="usuario">usuario</label>
                                      @error('usuario'){{$message}}@enderror
                                  </div>
                                  <div class="form-floating mb-3">
                                      <input class="form-control" id="password" type="password" name="password" placeholder="Contraseña" />
                                      <label for="password">Contraseña</label>
                                      @error('password'){{$message}}@enderror
                                  </div>
                                  
                                  <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <input type="submit" class="btn btn-primary" value="Login"> 
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </main>
  </div>
  <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
              <div class="d-flex align-items-center justify-content-between small">
                  <div class="text-muted">Copyright &copy; Your Website 2021</div>
                  <div>
                      <a href="#">Privacy Policy</a>
                      &middot;
                      <a href="#">Terms &amp; Conditions</a>
                  </div>
              </div>
          </div>
      </footer>
  </div>
</div
@endsection