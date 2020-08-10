@extends('layouts.app')
   
@section('head')
    <link rel="stylesheet" href="{{asset('css/estilos-hist.css')}}">
    <title>Historial de envios</title>
@endsection

@section('content')
<script>
    $('#m_4').addClass('menuact'); 
</script>
<main class="main col">
    <div class="row">
        <div class="columna col col-sm-12 ">
            <div class="widget entrada">
                <h2 class="titulo d-block mt-4">Historial de envios</h2>
                @if(session('mensaje'))
                    <div class="alert alert-success" role="alert"> {{ session('mensaje') }} </div>
                @endif
                <!--Tabla-->
                <div class="tablareg table-responsive-lg">
                    <table class="table table-bordered table-inverse table-hover table-responsive-lg">
                        <!--menu de tabla-->
                        <thead class="tittab">
                          <tr class="trtab">
                            <th scope="col">Documento <i class="far fa-file"></i></th>
                            @if(Auth::user()->is_admin == 1) 
                            <th scope="col"> Origen <i class="far fa-file"></i></th>
                            @endif
                            <th scope="col">Fecha y Hora <i class="fas fa-calendar-alt"></i></th>
                            <th scope="col">Imprimir <i class="fas fa-download"></i></th>
                            <th scope="col">Observacion <i class="far fa-eye"></i></th>
                          </tr>
                        </thead>
                        <tbody class="text-white text-center">
                          
                        @foreach($datos as $val)
                            <tr class="trtab">
                                <td scope="col">{{$val->nombre_informe}}</td>
                                @if(Auth::user()->is_admin == 1) 
                                <td>Ing. {{$val->materia->usuario->apellido}}</td> 
                                @endif
                                <td>{{$val->fecha_envio}}</td>
                                <td><a href="/historial/{{$val->id_informe}}" style="text-decoration: none;"> Descargar</a></td>
                                <td>
                                @if($enlaces[$val->id_informe] != -1 && 1==2)
                                    <a href="/mensaje/{{$enlaces[$val->id_informe]}}" 
                                        style="text-decoration: none;"> Ver</a>
                                @endif
                                <a href="/mensaje/nuevo/{{$val->id_informe}}" style="text-decoration: none;"> Enviar</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @if(Auth::user()->is_admin == 0)

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3 class="subt">Enviar plan de estudios</h3>
                            <div class="cuadro">
                                <div>
                                    <p class="texto">Selecciona la materia para enviar su plan de estudios</p>
                                </div>
                                <div>
                                    @if(session('alerta'))
                                        <div class="alert alert-danger" role="alert"> {{ session('alerta') }} </div>
                                    @endif
                                    <form method="POST" action="{{ route('add.plan') }}" enctype="multipart/form-data">
                                    @csrf

                                        <div class="mat justify-content-center">
                                            <label for="id_materia" class="labmat"><i class="fas fa-clipboard-list"></i> Materia &nbsp; </label>
                                            <select class="custom-select @error('id_materia') is-invalid @enderror" name="id_materia" id="id_materia">
                                                <option selected value="">Elegir materia...</option>
                                                @foreach($materias as $val)
                                                    <option value="{{$val->id_materia}}">   
                                                        <div class="row justify-content-between">
                                                            <div class="col-2"> <span>{{$val->sigla}}</span> </div>
                                                            <div class="col-2"> <span>"{{$val->paralelo}}"</span> </div>
                                                            <div class="col-2"> <span>{{$val->id_usuario}}</span> </div>
                                                        </div>
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('id_materia')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="dselarch row justify-content-center">
                                            <input type="file" name="archivo" class="dinput form-control @error('archivo') is-invalid @enderror justify-content-center">
                                            @error('archivo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row justify-content-center">
                                            <button type="submit" class="dbtn"><i class="fas fa-paper-plane"></i> Enviar plan de estudios</button>
                                        </div>    
                                    </form>
                                </div>
                                <div>
                                    <br>
                                    <p class="texto">Descargar el archivo base de plan de estudios</p>
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="dbtn2"><i class="fas fa-file-download"></i> <a href="/historial/-2"> Descargar archivo base</a></button>
                                </div> 
                            </div>
                            
                        </div>

                        <div class="col-12 col-md-6">
                            <h3 class="subt">Enviar informe de actividades</h3>
                            <div class="cuadro">
                                <div>
                                    <p class="texto">Selecciona la materia para enviar su informe de actividades de dicha materia</p>
                                </div>
                                <div>
                                    @if(session('alerta'))
                                        <div class="alert alert-danger" role="alert"> {{ session('alerta') }} </div>
                                    @endif
                                    <form method="POST" action="{{ route('add.informe') }}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="mat">
                                            <label for="id_materia" class="col-form-label"><i class="fas fa-clipboard-list"></i> Materia &nbsp;</label>
                                            <select class="custom-select @error('id_materia') is-invalid @enderror" name="id_materia" id="id_materia">
                                                <option selected value="">Elegir materia...</option>
                                                @foreach($materias as $val)
                                                    <option value="{{$val->id_materia}}">   
                                                        <div class="row justify-content-between">
                                                            <div class="col-2"> <span>{{$val->sigla}}</span> </div>
                                                            <div class="col-2"> <span>"{{$val->paralelo}}"</span> </div>
                                                            <div class="col-2"> <span>{{$val->id_usuario}}</span> </div>
                                                        </div>
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('id_materia')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="dselarch row justify-content-center">
                                            <input type="file" name="archivo" class="dinput form-control @error('archivo') is-invalid @enderror">
                                            @error('archivo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="row justify-content-center">
                                            <button type="submit" class="dbtn"><i class="fas fa-paper-plane"></i> Enviar informe de actividades </button>
                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <br>
                                    <p class="texto">Descargar el archivo base de informe de actividades</p>
                                </div>
                                <div class="row justify-content-center">
                                    <button type="submit" class="dbtn2"><i class="fas fa-file-download"></i> <a href="/historial/-1"> Descargar archivo base</a> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</main>

@endsection

@section('foot')
@endsection