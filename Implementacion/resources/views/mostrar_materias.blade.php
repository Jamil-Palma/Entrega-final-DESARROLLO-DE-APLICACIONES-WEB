@extends('layouts.app') 

@section('head')
    <link rel="stylesheet" href="{{asset('css/estilos-materia.css')}}">
    <title>Materias</title>
@endsection

@section('content')
<script>
        $('#m_8').addClass('menuact');
</script>
<script>
    $(document).ready(function(){
        autosize($("textarea"));
    })
</script>

<main class="main col">

    <div class="row">
        <div class="columna col col-sm-12 ">
            <h2 class="titulo mt-4">Datos de las materias</h2>
            <div class="widget entrada row justify-content-center">
                
                
                <!--Tabla-->
                <div class="tablareg table-responsive-lg">
                    <table class=" table table-bordered table-inverse table-hover table-sm">
                    <!--menu de tabla-->
                        <thead class="tittab">
                            <tr class="trtab">
                                <th scope="col">Sigla  <i class="fas fa-file-signature"></i></th>
                                <th scope="col">Paralelo  <i class="fas fa-sort-alpha-down"></i></th>
                                <th scope="col">Materia  <i class="fas fa-signature"></i></th>
                                <th scope="col">Docente  <i class="fas fa-user-tie"></i></th>
                                <th scope="col">Modificar <i class="fas fa-edit"></i></th>
                            </tr>
                        </thead>
                        <tbody >
                            
                            @foreach($datos as $val)
                                <tr class="trtab">
                                    <td class=""><span>{{$val->sigla}}</span></td>
                                    <td class=""><span>{{$val->paralelo}}</span></td>
                                    <td class=""><span>{{$val->nombre}}</span></td>
                                    <td class=""><span>Ing. {{$val->usuario->nombre}} {{$val->usuario->apellido}}</span></td>
                                    <td class="">
                                        <button type="button" data-toggle="modal" data-target="#ModificarMat{{$val->id_materia}}" class="dbtn3"><i class="fas fa-edit"></i> Modificar</button>
                                        
                                    </td>
                                </tr>
                            @endforeach

                            
                        </tbody>
                    </table>
                </div>

                <div class="row justify-content-center">
                    <div class=" col-12 col-md-6 justify-content-center"> <!--SE PUSO EN UNA COLUMNA-->
                        <br>
                        <h3 class="subt">Registrar nueva materia</h3>
                        <div class="row justify-content-center">
                            <div class="cuadro row justify-content-center">
                                @if (session('alerta'))
                                    <div class="alert alert-danger" role="alert"> {{ session('alerta') }} </div>
                                @endif
                                <form method="POST" action="{{ route('add.materia') }}">
                                @csrf

                                    <div class="form-group row justify-content-center">
                                        <label for="ci" class="col-form-label text-md-right"><i class="fas fa-file-signature"></i> Sigla:&nbsp;&nbsp;&nbsp;&nbsp;</label>

                                        <div class="">
                                            <input id="sigla" type="text" class="dinput form-control @error('sigla') is-invalid @enderror" name="sigla" value="{{ old('sigla') }}" required autofocus>

                                            @error('sigla')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">
                                        <label for="nombre" class="col-form-label text-md-right"><i class="fas fa-sort-alpha-down"></i> Paralelo:</label>

                                        <div class="">
                                            <input id="paralelo" type="text" class=" dinput form-control @error('paralelo') is-invalid @enderror" name="paralelo" value="{{ old('paralelo') }}" required autofocus>

                                            @error('paralelo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">
                                        <label for="nombre" class="col-form-label text-md-right"><i class="fas fa-signature"></i> Materia:</label>
                                        <div class="">
                                        <!--SE CAMBIO EL INPUT POR UN TEXTAREA-->
                                            <textarea id="nombre" type="text" rows="1" class="dinput form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autofocus></textarea>

                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">
                                        <label for="id_usuario" class=" col-form-label text-md-right"><i class="fas fa-user-tie"></i> Docente:&nbsp;&nbsp;&nbsp;</label>
                                        <select class="custom-select @error('id_usuario') is-invalid @enderror" name="id_usuario" id="id_usuario">
                                            <option selected value="">Elegir docente...</option>
                                            @foreach($docentes as $val)
                                            <option value="{{$val->id_usuario}}">   
                                                <div class="row justify-content-between">
                                                    <div class="col-2"> <span>Ing. {{$val->nombre}}</span> </div>
                                                    <div class="col-2"> <span>{{$val->apellido}}</span> </div>
                                                </div>
                                            </option>
                                            @endforeach
                                        </select>

                                        @error('id_usuario')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row justify-content-center">
                                        <button type="submit" class="dbtn btn-primary"><i class="fas fa-folder-plus"></i> Registrar </button>
                                    </div> 
                                </form>
                            </div>
                            
                        </div>

                    </div>

                    <div class=" col-12 col-md-6 justify-content-center"> <!--SE METIO EN UNA NUEVA FILA-->
                        <!-- ELIMINAR -->
                        <div class="col  d-block row justify-content-center">
                            <br>
                            <h3 class="subt">Eliminar materia</h3> 
                                                    
                            <div class=" row justify-content-center"> 
                                <div class="cuadro ">
                                    <form method="POST" action="{{route('eliminar.materia')}}">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <div class="form-group">
                                            @error('id_eliminar')
                                                <div class="alert alert-primary" role="alert"> {{$message}} </div>
                                            @enderror
                                            @if(session('alerta'))
                                                <div class="alert alert-primary" role="alert"> {{ session('alerta') }} </div>
                                            @endif
                                            <label for="id_eliminar">Definir la materia a eliminar</label>

                                            <select class="custom-select" name="id_eliminar" id="id_eliminar">
                                                <option selected>Elegir materia..</option>
                                                @foreach($datos as $val)
                                                <option value="{{$val->id_materia}}">   
                                                <div class="row justify-content-between">
                                                    <div class="col-2"> <span>{{$val->sigla}}</span> </div>
                                                    <div class="col-2"> <span>{{$val->paralelo}}</span> </div>
                                                    <div class="col-2"> <span>{{$val->nombre}}</span> </div>
                                                </div>
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row justify-content-center">
                                            <button type="submit" class="dbtn2 btn-primary"><i class="fas fa-trash-alt"></i> Eliminar</button>
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
    <!-- Modal -->
    @foreach($datos as $val)
    <div class="modal fade" id="ModificarMat{{$val->id_materia}}" tabindex="-1" role="dialog" aria-labelledby="ModificarMatLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModificarMatLabel">Modificar Materia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form method="POST" action="{{ route('modificar.materia') }}">
                        @csrf
                        {{method_field('PATCH')}}
                            <div class="form-group row justify-content-center">
                                <label for="ci" class="col-form-label text-md-right"><i class="fas fa-file-signature"></i> Sigla:&nbsp;&nbsp;&nbsp;&nbsp;</label>

                                <div class="">
                                    <input id="sigla2" type="text" class="dinput form-control @error('sigla2') is-invalid @enderror" name="sigla2" value="{{ $val->sigla }}" required autofocus>

                                    @error('sigla2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="paralelo2" class="col-form-label text-md-right"><i class="fas fa-sort-alpha-down"></i> Paralelo:</label>

                                <div class="">
                                    <input id="paralelo2" type="text" class=" dinput form-control @error('paralelo2') is-invalid @enderror" name="paralelo2" value="{{ $val->paralelo }}" required autofocus>

                                    @error('paralelo2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="nombre2" class="col-form-label text-md-right"><i class="fas fa-signature"></i> Materia:</label>
                                <div class="">
                                    <input id="nombre2" type="text" class="dinput form-control @error('nombre2') is-invalid @enderror" name="nombre2" value="{{ $val->nombre }}" required autofocus>

                                    @error('nombre2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="id_usuario2" class=" col-form-label text-md-right"><i class="fas fa-user-tie"></i> Docente:&nbsp;</label>
                                <select class="custom-select @error('id_usuario2') is-invalid @enderror" name="id_usuario2" id="id_usuario2">
                                    
                                    @foreach($docentes as $val2)
                                    <option value="{{$val2->id_usuario}}">   
                                        <div class="row justify-content-between">
                                            <div class="col-2"><span>Ing.</span></div>
                                            <div class="col-2"> <span>{{$val2->nombre}}</span> </div>
                                            <div class="col-2"> <span>{{$val2->apellido}}</span> </div>
                                        </div>
                                    </option>
                                    @endforeach
                                </select>

                                @error('id_usuario2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="id_materia2" value="{{ $val->id_materia }}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                                
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</main>

@endsection

@section('foot')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<script src="{{asset('js/scripts.js')}}"></script>

@endsection