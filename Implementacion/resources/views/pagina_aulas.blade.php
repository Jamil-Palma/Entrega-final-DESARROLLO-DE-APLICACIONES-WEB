@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/estilos-aulas.css')}}">
    <title>Aulas</title>
@endsection
@section('content')
<script>
        $('#m_9').addClass('menuact');
</script>

<main class="main col">
    <div class="row">
        <div class="columna col col-sm-12 ">
            <h2 class="titulo mt-4">Datos de las aulas</h2>
            <div class="widget entrada row justify-content-center">
                <div class="cuadro">
                    <p><i class="fas fa-door-open"></i> Aulas</p>
                    
                    @forelse($aulas as $aula)
                        
                        <!--Listado de aulas-->
                        <div class="input-group mb-3 w-75">
                            <input class="dinput" type="text" value={{$aula->curso}} readonly="readonly" >
                            <form method="GET" action="{{route('eliminar.aula')}}">
                                <input type="hidden" value={{$aula->id_aula}} name="id">
                                <div class="input-group-prepend">
                                    <button class='dbtn2 p_aulas_eliminar' type="submit"><i class="fas fa-trash-alt"></i> ELiminar</button>
                                </div>
                            </form>

                                

                        </div>

                        <hr>
                        @empty
                        <p>NO existen aulas registradas</p>
                    @endforelse
                    @error('aulaadd1')
                        <div class="alert alert-primary" role="alert"> {{$message}} </div>
                    @enderror
                    @if(session('alerta'))
                        <div class="alert alert-primary" role="alert"> {{ session('alerta') }} </div>
                    @endif
                </div>

                <div class="cuadro">
                	<form method="POST" action="{{url('aula/add')}}">
                		@csrf
                		<label for='aulaadd1'>Ingrese aula</label>
                		<input class="dinput" type="text" name="aulaadd1" value="{{old('aulaadd1')}}" id='aula_nombre_add'>
                		<br>
                		<button type="submit" class="dbtn boton_envio"><i class="fas fa-plus-square"></i> Crear aula</button>		
                	</form>
                </div>

            </div>
        </div>
    </div>    
</main>

@endsection
@section('foot')
@endsection





    
