<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min2.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/fontello.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilo-menu.css')}}">
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    @yield('head')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class=" barra-lateral col-12 col-sm-auto">
                <div class="logo d-block justify-content-center">
                    <div class="foto">
                        @if(Auth::user()->is_admin)
                        <img src="{{asset('img/persona3.jpg')}}" width="100">
                        @else
                        <img src="{{asset('img/persona2.jpg')}}" width="100">
                        @endif
                    </div>  
                    <div class="col-auto ">
                        <h2>Ing. {{Auth::user()->nombre.' '.Auth::user()->apellido}}</h2>
                    </div>
                </div>
                <!--Menu-->

                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href="{{ route('home') }}" id="m_1" data-toggle="tooltip" data-placement="right" title="Inicio"><i class="icm fas fa-home"></i><br> <span>Inicio</span> </a>

                    <a href="{{ route('show.info') }}" id="m_2" data-toggle="tooltip" data-placement="right" title="Cuenta"><i class="icm fas fa-user-circle"></i><br> <span>Cuenta</span></a>

                    <a href="{{ route('show.all') }}" id="m_3" data-toggle="tooltip" data-placement="right" title="Mensajes"><i class="icm fas fa-envelope"></i><br> <span>Mensajes</span></a>
                    
                    <a href="{{ route('show.historial') }}" id="m_4" data-toggle="tooltip" data-placement="right" title="Historial de envios"><i class="icm fas fa-folder-open"></i><br> <span>Historial de envios__</span></a>

                    @if(Auth::user()->is_admin)
                    <a href="{{ route('show.materia') }}" id="m_8" data-toggle="tooltip" data-placement="right" title="Materias"><i class="icm fas fa-sitemap"></i><br> <span>Materias</span></a>
                    <a href="{{ route('show.aula') }}" id="m_9" data-toggle="tooltip" data-placement="right" title="Aulas"><i class="icm fas fa-door-open"></i></i><br> <span>Aulas</span></a>
                    <a href="{{ route('show.users') }}" id="m_5" data-toggle="tooltip" data-placement="right" title="Gestionar usuarios"><i class="icm icon-cog-alt"></i><br> <span>Gestionar usuarios</span></a>
                    <a href="{{ route('show.extra') }}" id="m_6" data-toggle="tooltip" data-placement="right" title="Comunicados"><i class="icm fas fa-bullhorn"></i><br> <span>Comunicados</span></a>
                    @else
                    <a href="{{ route('show.horario') }}" id="m_7" data-toggle="tooltip" data-placement="right" title="Horario"><i class="icm far fa-calendar-alt"></i><br> <span>Horario</span></a>
                    
                    @endif
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="right" title="Salir"><i class="icm fas fa-sign-out-alt"></i><br> <span>Salir</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </nav>
            </div>
        
            @yield('content')
            
        </div>
    </div>
    @yield('foot')
</body>
</html>
