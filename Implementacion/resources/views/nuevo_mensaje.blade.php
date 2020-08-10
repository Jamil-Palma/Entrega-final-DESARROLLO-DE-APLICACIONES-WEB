@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h2 row">
        <h2>NUEVO MENSAJE</h2>
    </div>
    @if(session('alerta'))
        <div class="alert alert-danger" role="alert"> {{ session('alerta') }} </div>
    @endif
    @if(session('mensaje'))
        <div class="alert alert-success" role="alert"> {{ session('mensaje') }} </div>
    @endif

        <form method="POST" action="{{ route('send.message') }}">
        @csrf

        <div class="form-group row">
            <label for="origen" class="col-form-label">Origen</label>
            <input name="origen" class="form-control" value="{{Auth::user()->user_name}}" disabled>
        </div>

        <div class="form-group row">
            <label for="destino" class="col-form-label">Destino</label>
            <select class="custom-select @error('destino') is-invalid @enderror" name="destino">
                <option selected value="">Elegir destinatario...</option>
                @foreach($docentes as $val)
                <option value="{{$val->id_usuario}}">   
                    <div class="row justify-content-between">
                        <div class="col-2"> <span>{{$val->id_usuario}}</span> </div>
                        <div class="col-2"> <span>{{$val->nombre}}</span> </div>
                        <div class="col-2"> <span>{{$val->user_name}}</span> </div>
                    </div>
                </option>
                @endforeach
            </select>

            @error('destino')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row mb-0">
            <label for="asunto" class="col-form-label">Asunto</label>
            <input type="hidden" name="id_informe" value="{{$id}}">
            <input type="text" name="asunto" class="form-control @error('asunto') is-invalid @enderror" value="{{$asunto}}" disabled>
            @error('asunto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>

        <div class="form-group row">
            <textarea name="mensaje" rows="8" class="form-control @error('mensaje') is-invalid @enderror">{{old('mensaje')}}
            </textarea>
            @error('mensaje')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <br>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary"> Enviar mensaje </button>
            </div>
        </div>
        </form>
</div>
@endsection
