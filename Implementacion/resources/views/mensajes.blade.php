@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{asset('css/mensajes.css')}}">
    <title>Lista de Mensajes</title>
@endsection
@section('content')
<!--Cuerpo-->
<script>
    $('#m_3').addClass('menuact');
</script>
<main class="main col">
  <div class="row">
    <div class="columna col col-sm-12 ">
        <div class="widget entrada">
            <h2 class="titulo d-block mt-4">mensajes</h2> 
            <div class="row">
                
                <div class="col-12 col-md-auto col-md-12">
                    <h3 class="subt">
                    Lista de Mensajes
                    </h3>
                    <!--Tabla--> 
                    <div class="tablareg table-responsive-lg">
                        <table class="table table-bordered table-inverse table-hover table-responsive-lg">
                            <thead class="tittab">
                              <tr class="trtab">
                                <th scope="col">Mensaje</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">Fecha y hora</th>
                              </tr>
                            </thead>
                            <tbody class="text-white text-center">
                            
                            @foreach($datos as $val)
                            <tr class="trtab" data-toggle="modal" data-target="#Modal{{$val->id_obs}}">
                                <td scope="row"> {{$val->asunto}} </td>
                                <td>Ing. {{$val->origen->apellido}} </td>
                                <td>Ing. {{$val->destino->apellido}} </td>
                                <td>{{$val->fecha_envio}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="col-lg-12 d-flex justify-content-center">
                        <!--para buscar por el asunto del mensaje-->
                        <form method='GET' action="{{route('search.message')}}" class="form-inline">
                            <input type="text" class="dinput form-inline my-3" name="nombre" id="nombre" placeholder="Buscar Origen">
                            <button type="submit" class="dbtn d-inline-block"><i class="fas fa-search"></i> Buscar</button>
                        </form>
                    
                    </div>
                    
                    <!-- MODAL DEL MENSAJE PARA VER -->
                    @foreach($datos as $val)
                    <div class="modal fade" id="Modal{{$val->id_obs}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                            <strong>Mensaje</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">
                                <strong>De:</strong></label>
                                <label for="recipient-name" class="col-form-label" id="nombre-usuario">Ing. {{$val->origen->nombre}} {{$val->origen->apellido}} </label>
                                <br>
                                <label for="recipient-name" class="col-form-label">
                                <strong>Para:</strong></label>
                                <label for="recipient-name" class="col-form-label" id="nombre-remitente"> Ing. {{$val->destino->nombre}} {{$val->destino->apellido}} </label>
                                <br>    
                                <label for="recipient-name" class="col-form-label">
                                <strong>Ref:</strong></label>
                                <label for="recipient-name" class="col-form-label" id="asunto"> {{$val->asunto}}</label>
                                <br>
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">
                                <strong>Mensaje:</strong></label>
                                <textarea class="form-control" id="message-text" disabled>{{$val->detalle}}</textarea>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><strong>Cerrar</strong></button>
                          </div>
                        </div>
                      </div>
                    </div>  
                    @endforeach

                </div>
            </div>
        </div>
    </div>
  </div>
</main>
@endsection

@section('foot')
@endsection