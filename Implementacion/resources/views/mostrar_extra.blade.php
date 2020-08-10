@extends('layouts.app')

@section('content')
<script>
    $('#m_6').addClass('menuact');
</script>
<main class="main col">
    <div class="row justify-content-center">
        <div class="columna col-lg-12 ">
            
            <div class="widget entrada row justify-content-center">
                <h2 class="titulo d-flex justify-content-center mt-4">Administrar comunicados</h2>
                <div class="cuadro2 col-12 row justify-content-center">
                    <div class="subt h1 row">
                        <h1>Informacion a considerar</h1>
                    </div>
                    @if(session('alerta'))
                        <div class="alert alert-danger" role="alert"> {{ session('alerta') }} </div>
                    @endif
                        <form method="POST" action="{{ route('add.extra') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <label for="anuncio" class="col-form-label">Anuncio</label>

                            <textarea name="anuncio" class="dinput form-control @error('anuncio') is-invalid @enderror">{{old('anuncio')}}
                            </textarea>
                            @error('anuncio')>
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row justify-content-center ">
                            <label for="fecha" class="col-form-label">Fecha limite de entrega de informes. Formato :AAAA-MM-DD HH:MM:SS</label>
                            <input type="text" name="fecha" class=" dinput form-control @error('fecha') is-invalid @enderror" value="{{old('fecha')}}">
                            @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row justify-content-center">
                            <label for="semestre" class="col-form-label">Semestre en curso. Ejemplo: I-2020</label>
                            <input type="text" name="semestre" class="dinput form-control @error('semestre') is-invalid @enderror" value="{{old('semestre')}}">
                            @error('semestre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="row justify-content-center">
                                <button type="submit" class="dbtn btn-primary"> Actualizar datos </button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
