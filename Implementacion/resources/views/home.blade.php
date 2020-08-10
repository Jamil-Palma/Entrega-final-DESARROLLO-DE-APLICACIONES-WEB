@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/estilos-home.css')}}">
    <title>Home</title>     
@endsection

@section('content')
    <script>
        $('#m_1').addClass('menuact');
    </script>
        <main class="main col">
            <div class="row">
                <div class="columna col-lg-12 ">
                    <div class="widget entrada">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        @if (session('estado'))
                            <div class="alert alert-success" role="alert">
                                {{ session('estado') }}
                            </div>
                        @endif

                        @if (session('alerta'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('alerta') }}
                            </div>
                        @endif

                        <h2 class="titulo d-flex justify-content-center mt-4">Anuncios</h2>
            
                        <!--Slaider de la galeria-->
                        <div class="carrr row slider justify-content-center">

                                <div class="carousel slide justify-content-center col-12  col-lg-8" id="slider" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#slider" data-slide-to="0" class="active"></li>
                                        <li data-target="#slider" data-slide-to="1"></li>
                                       
                                    </ol>
                                    <div class="carousel-inner justify-content-center">
                                        <div class="carousel-item justify-content-center">
                                            <img src="{{asset('img/img-sistemas.jpg')}}" alt="" class="d-block img-fluid ">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Ingenieria de Sistemas</h5>
                                                <p>...</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item active justify-content-center">
                                            <img src="{{asset('img/img-info.jpg')}}" alt="" class="d-block img-fluid ">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>Ingenieria Informatica</h5>
                                                <p>...</p>
                                            </div>
                                        </div>    
                                    </div>
                                    <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <!-- Reloj -->
                                <div class="wrap col-12  col-lg-4">
                                    <div class="widgett">
                                        <div class="fecha">
                                            <p id="diaSemana" class="diaSemana"></p>
                                            <p id="dia" class="dia"></p>
                                            <p>de </p>
                                            <p id="mes" class="mes"></p>
                                            <p>del </p>
                                            <p id="year" class="year"></p>
                                        </div>
                                        <div class="reloj">
                                            <p id="horas" class="horas"></p>
                                            <p>:</p>
                                            <p id="minutos" class="minutos"></p>
                                            <p>:</p>
                                            <div class="caja-segundos">
                                                <p id="ampm" class="ampm"></p>
                                                <p id="segundos" class="segundos"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script src="{{asset('js/reloj.js')}}"></script>
                            <!-- </div> -->
                        </div>
                        <br>
                        <!--Añadiendo portafolio -->
                        <div class="row galeria justify-content-center">
                            
                            <div class="contenedor-fecha col-12 col-lg-12">
                                <form>
                                    <textarea name="" id="" cols="100" rows="1" disabled>Fecha limite para entrega de informes: {{$anuncio->fecha_limite}}</textarea>
                                </form>
                            </div>
                            
                            <div class="contenedor-texto col-12 col-lg-12">
                                <form action="">
                                    <textarea name="" id="" cols="30" rows="10" disabled>{{$anuncio->anuncio}}</textarea>  
                                </form>

                            </div>
                            <div class="contenedor-img col-12 col-lg-4 ">
                                <a href="#" data-toggle="modal" data-target="#modal">
                                    <img src="{{asset('img/fon2.jpg')}}" class="img-fluid imagen" alt="">
                                </a>
                            </div>
                           
                            <div class="contenedor-img col-12 col-lg-4 align-items-center">
                                <a href="#" data-toggle="modal" data-target="#modal">
                                    <img src="{{asset('img/fon1.jpg')}}" class="img-fluid imagen" alt="">
                                </a>
                            </div>
                            <div class="contenedor-img col-12 col-lg-4 align-items-center">
                                <a href="#" data-toggle="modal" data-target="#modal">
                                    <img src="{{asset('img/fon3.jpg')}}" class="img-fluid imagen" alt="">
                                </a>
                            </div>

                            <!--Efecto modal-->
                            <div class="modal fade" id="modal">
                                <div class="modal-dialog d-flex justify-content-center align-items-center">
                                    <div class="modal-content align-items-center">
                                        <img src="{{asset('img/fon1.jpg')}}" class="img-fluid imagen" alt="" id="imagen-modal">
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