@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/estilocuenta.css')}}">
    <title>Cuenta de usuario</title>
@endsection
@section('content')
<!--Cuenta-->
<script>
    $('#m_2').addClass('menuact');
</script>
<main class="main col">
    <div class="row">

            <div class="columna col-lg-12 ">
                <h2 class="titulo d-block mt-4">perfil de usuario</h2>
                <div class="widget entrada">
                    
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3 class="subt text-white text-center">
                            Perfil
                            </h3>
                            <div id="percuenta">
                                <form class="cuenform">
                                    <div>
                                        <strong>Nombre: </strong>
                                        <label class="dat">{{ Auth::user()->nombre }}</label>
                                    </div>
                                    <div>
                                        <strong>Apellido: </strong>
                                        <label class="dat">{{ Auth::user()->apellido }}</label>
                                    <div>
                                    </div>
                                        <strong>Cedula de identidad: </strong>
                                        <label class="dat">{{ Auth::user()->ci }}</label>
                                    </div>
                                    <div>
                                        <strong>User Name: </strong>
                                        <label class="dat">{{ Auth::user()->user_name }}</label>
                                    </div>
                                    <div>
                                        <strong>Celular: </strong>
                                        <label class="dat">{{ Auth::user()->cel }}</label>
                                    </div>
                                    <div>
                                        <strong>E-mail: </strong>
                                        <label class="dat">{{ Auth::user()->email }}</label>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <h3 class="subt text-white text-center">
                            Editar Cuenta
                            </h3>
                            <div class="editform">
                                @if(session('alerta'))
                                <div class="alert alert-success" role="alert"> {{ session('alerta') }} </div>
                                @endif
                                <form method="POST" action="{{ route('modify.user') }}">
                                    @csrf
                                    {{method_field('PATCH')}}
                                    <div>
                                        <label for="nombre">Nombre</label>

                                        <div>
                                            <input id="nombre" type="text" placeholder="Nombres" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ Auth::user()->nombre }}">
                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="apellido" >Apellido</label>

                                        <div>
                                            <input id="apellido" type="text" placeholder="Apellidos" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ Auth::user()->apellido }}">
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
                                            <input id="ci" type="text" placeholder="Cedula de Identidad"class="form-control @error('ci') is-invalid @enderror" name="ci" value="{{ Auth::user()->ci }}">
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
                                            <input id="cel" type="text" placeholder="Celular"class="form-control @error('cel') is-invalid @enderror" name="cel" value="{{ Auth::user()->cel }}">
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
                                            <input id="email" type="email" placeholder="E-Mail Address"class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}">
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
                                            <input id="user_name" type="text" placeholder="User Name"class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ Auth::user()->user_name }}">

                                            @error('user_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="password" >Password</label>
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
                                    <div >
                                        <div>
                                            <button type="submit" class="act btn btn-primary d-flex justify-content-center">
                                                Actualizar
                                            </button>
                                        </div>
                                    </div>
                                </form>
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