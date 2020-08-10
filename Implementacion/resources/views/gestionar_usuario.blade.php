@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/estilogestionaruser.css')}}">
    <title>Gestionar Usuarios</title>
@endsection
@section('content')
<script>
    $('#m_5').addClass('menuact'); 
</script>
<main class="main col">
    <div class="row justify-content-center">
        <div class="columna col-lg-12 ">
            <div class="widget entrada">
                <h2 class="titulo d-block mt-4">gestionar usuarios</h2>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <h3 class="subt text-white text-center ">    
                        Lista de Usuarios
                        </h3>
                        @error('id_eliminar')
                        <div class="alert alert-primary" role="alert"> {{$message}} </div>
                        @enderror
                        @if(session('alerta'))
                            <div class="alert alert-primary" role="alert"> {{ session('alerta') }} </div>
                        @endif
                        <!--Tabla-->
                        <div class="tablareg table-responsive-lg">
                            <table class="table table-bordered table-inverse table-hover table-responsive-lg">
                                <thead class="tittab">
                                  <tr class="trtab">
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">CI</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Eliminar</th>
                                  </tr>
                                </thead>

                                <tbody class="text-white text-center">
                                @foreach($datos as $val)
                                <tr class="trtab">
                                    <td scope="row">{{$val->nombre}}</th>
                                    <td>{{$val->apellido}}</td>
                                    <td>{{$val->ci}}</td>
                                    @if(Auth::user()->is_admin)
                                        <td>Administrador</td>
                                    @else
                                        <td>Docente</td>
                                    @endif
                                    <td>{{$val->email}}</td>
                                    <td>
                                        <!--ELIMINAR USUARIO-->
                                        <form method="POST" action="{{route('delete.user')}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <input type="hidden" name="id_eliminar" value="{{$val->id_usuario}}">
                                            <button class="act" type="submit" ><i class="fas fa-user-slash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach            
                                </tbody>
                            </table>
                        </div>

                        <div class=" col-12 col-lg-12  text-center">
                            <form action="" class="form-check-inline col-12 col-md-8">
                                <button class="dbtn button" type="button" data-toggle="modal" data-target="#nuevoUsuario" data-whatever=""><i class="fas fa-user-plus"></i>  Agregar Nuevo Usuario</button>
                            </form>
                        </div>


                        <!-- modal para el nuevo usuario -->
                        <div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="nuevoUsuarioLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="nuevoUsuarioLabel">Nuevo Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div>
                                    <div class="editform">
                                    <form method="POST" action="{{ route('register') }}">
                                    @csrf                     
                                        <div>
                                            <label for="nombre">Nombres</label>
                                            <div>
                                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autofocus>
                                                @error('nombre')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="apellido" >Apellidos</label>
                                            <div>
                                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autofocus>
                                                @error('apellido')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="ci">Cedula de Identidad</label>
                                            <div>
                                                <input id="ci" type="text" class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ old('ci') }}" required autofocus>
                                                @error('ci')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="cel" >Celular</label>
                                            <div >
                                                <input id="cel" type="text" class="form-control @error('cel') is-invalid @enderror" name="cel" value="{{ old('cel') }}" required autocomplete="cel" autofocus>
                                                @error('cel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="email" >E-Mail Address</label>
                                            <div>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="user_name" >User name</label>
                                            <div >
                                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autofocus>
                                                @error('user_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="password" autocomplete="off">Password</label>
                                            <div>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="password-confirm" >Confirmar Password</label>
                                            <div>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <br>

                                        <input type='hidden' value='0' name='is_admin'>
                                        <div>
                                            <input type="checkbox" name="is_admin" class="form-check-input @error('is_admin') is-invalid @enderror" id="is_admin" value="1">
                                            <label class="form-check-label" for="is_admin">Administrador</label>
                                            @error('is_admin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button submit" class="btn btn-primary">Agregar</button>
                                        </div>    
                                    </form>
                                    </div>
                                </div>
                               
                              </div>
                              
                            </div>
                          </div>
                        </div>

                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('foot')
@endsection