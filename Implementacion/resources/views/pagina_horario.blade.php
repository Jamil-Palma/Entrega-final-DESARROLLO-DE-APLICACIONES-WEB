@extends('layouts.app')
   
@section('head')
<link rel="stylesheet" href="{{asset('css/horario.css')}}">
<script src="{{asset('js/horario.js')}}"></script>
    
@endsection

@section('content')

<script>
        $('#m_7').addClass('menuact');
</script>
<main class="main col">
    <div class="row">
        <div class=" bodyhor columna col-lg-12 ">
        	<h2 class="titulo mt-4">Horario del docente</h2>
        	<div class="col-12">
                <p class="texto">Llenar los campos para registar la materia:</p>
            </div>
            <div class=" widget entrada row justify-content-center">
            	
            	
				<div class=" col-12 col-xl-6 row justify-content-center">
					
                    <br>
					<!--llenar datos-->
					<div class="llenar">
						<form method="POST" action="{{url('horario/add')}}">
							@csrf
	                        <div class="col-auto">
								<label for='sigla'><i class="fas fa-file-signature"></i> Sigla de la Materia</label>
								<input class="dinput" type="text" name="sigla" value="{{old('sigla')}}" id='sigla_horario'>
							</div>
							<br>
	                        <div class="col-auto">
								<label for='paralelo'><i class="fas fa-sort-alpha-down"></i> Paralelo</label>
								<input class="dinput" type="text" name="paralelo" value="{{old('paralelo')}}" id='paralelo_horario'>
							</div>
							<br>
							<div class="col-auto">
								<label for="curso"><i class="fas fa-door-open"></i> Aula&nbsp;</label>
								<input class="dinput" type="text" name="curso" value="{{old('curso')}}" id='aula_horario'>
								<select name='aula2' value='{{old("aula2")}}' id='LIS'>
									<option class='lista'>Seleccione un aula...</option>
									@forelse($cursos as $c)
										<option class='lista'>{{$c->curso}}</option>
									@empty
										<option>NO existen cursos disponibles</option>
									@endforelse
								</select>
							</div> 
							<div class="col-auto">
								<label for='horario'>Horario Seleccionado&nbsp; <i class="fas fa-hand-point-right"></i> &nbsp;</label>
								<label id="horario_elegido" name="n_horario_elegido" value=""></label>
								<input type="text" name="hora" value="" id='hora_horario'>
								<br>
								<button type="submit" class="dbtn boton_envio"><i class="fas fa-calendar-plus"></i> Crear horario</button>
								<br>
							</div>		
						</form>
					</div>	
					<!--fin llenar datos-->				
				</div>
				
				<div>
					@error('curso')
				        <div class="alert alert-primary" role="alert"> {{$message}} </div>
				    @enderror
				    @error('sigla')
				        <div class="alert alert-primary" role="alert"> {{$message}} </div>
				    @enderror
				    
				    @error('paralelo')
				        <div class="alert alert-primary" role="alert"> {{$message}} </div>
				    @enderror
				    @error('hora')
				        <div class="alert alert-primary" role="alert"> {{$message}} </div>
				    @enderror
				    
				    @if(session('alerta'))
				        <div class="alert alert-primary" role="alert"> {{ session('alerta') }} </div>
				    @endif
				</div>
				
				
				<div id="div_horario" class="tabhorario1"> 
					<table class="horario">
					  <tr> 
					    <th>Hora / Dia</th>
					    <th class="tam">Lunes</th>
					    <th class="tam">Martes</th>
					    <th class="tam">Miercoles</th>
					    <th class="tam">Jueves</th>
					    <th class="tam">Viernes</th>
					    <th class="tam">Sabado</th>
					  </tr>
					  <tr>
					    <th>7:00 - 8:30</th>
					    <td class="horario_click" name="1" ><a href="#"></a></td>


					     <td class="horario_click" name="9"></td> <td class="horario_click" name="17"></td> <td class="horario_click" name="25"></td> <td class="horario_click" name="33"></td> <td class="horario_click" name="41"></td>
					  </tr>
					  <tr>
					    <th>8:30 - 10:00</th>
					    <td class="horario_click" name="2"></td> <td class="horario_click" name="10"></td> <td class="horario_click" name="18"></td> <td class="horario_click" name="26"></td> <td class="horario_click" name="34"></td> <td class="horario_click" name="42"></td>
					  </tr>
					  <tr>
					    <th>10:30 - 12:00</th>
					    <td class="horario_click" name="3"></td> <td class="horario_click" name="11"></td> <td class="horario_click" name="19"></td> <td class="horario_click" name="27"></td> <td class="horario_click" name="35"></td> <td class="horario_click" name="43"></td>
					  </tr>
					  <tr>
					    <th>12:30 - 14:00</th>
					    <td class="horario_click" name="4"></td> <td class="horario_click" name="12"></td> <td class="horario_click" name="20"></td> <td class="horario_click" name="28"></td> <td class="horario_click" name="36"></td> <td class="horario_click" name="44"></td>
					  </tr>
					  <tr>
					    <th>14:30 - 16:00</th>
					    <td class="horario_click" name="5"></td> <td class="horario_click" name="13"></td> <td class="horario_click" name="21"></td> <td class="horario_click" name="29"></td> <td class="horario_click" name="37"></td> <td class="horario_click" name="45"></td>
					  </tr>
					  <tr>
					    <th>16:30 - 18:00</th>
					    <td class="horario_click" name="6"></td> <td class="horario_click" name="14"></td> <td class="horario_click" name="22"></td> <td class="horario_click" name="30"></td> <td class="horario_click" name="38"></td> <td class="horario_click" name="46"></td>
					  </tr>
					  <tr>
					    <th>18:30 - 20:00</th>
					    <td class="horario_click" name="7"></td> <td class="horario_click" name="15"></td> <td class="horario_click" name="23"></td> <td class="horario_click" name="31"></td> <td class="horario_click" name="39"></td> <td class="horario_click" name="47"></td>
					  </tr>
					  <tr>
					    <th>20:30 - 22:00</th>
					    <td class="horario_click" name="8"></td> <td class="horario_click" name="16"></td> <td class="horario_click" name="24"></td> <td class="horario_click" name="32"></td> <td class="horario_click" name="40"></td> <td class="horario_click" name="48"></td>
					  </tr>
					  
					</table>
				</div>

				<div id="div_horario" class="tabhorario2"> 
					<table class="horario">
					  <tr> 
					    <th>H / D</th>
					    <th class="tam">L</th>
					    <th class="tam">M</th>
					    <th class="tam">M</th>
					    <th class="tam">J</th>
					    <th class="tam">V</th>
					    <th class="tam">S</th>
					  </tr>
					  <tr>
					    <th>7:00</th>
					    <td class="horario_click" name="1" ><a href="#"></a></td>


					     <td class="horario_click" name="9"></td> <td class="horario_click" name="17"></td> <td class="horario_click" name="25"></td> <td class="horario_click" name="33"></td> <td class="horario_click" name="41"></td>
					  </tr>
					  <tr>
					    <th>8:30</th>
					    <td class="horario_click" name="2"></td> <td class="horario_click" name="10"></td> <td class="horario_click" name="18"></td> <td class="horario_click" name="26"></td> <td class="horario_click" name="34"></td> <td class="horario_click" name="42"></td>
					  </tr>
					  <tr>
					    <th>10:30</th>
					    <td class="horario_click" name="3"></td> <td class="horario_click" name="11"></td> <td class="horario_click" name="19"></td> <td class="horario_click" name="27"></td> <td class="horario_click" name="35"></td> <td class="horario_click" name="43"></td>
					  </tr>
					  <tr>
					    <th>12:30</th>
					    <td class="horario_click" name="4"></td> <td class="horario_click" name="12"></td> <td class="horario_click" name="20"></td> <td class="horario_click" name="28"></td> <td class="horario_click" name="36"></td> <td class="horario_click" name="44"></td>
					  </tr>
					  <tr>
					    <th>14:30</th>
					    <td class="horario_click" name="5"></td> <td class="horario_click" name="13"></td> <td class="horario_click" name="21"></td> <td class="horario_click" name="29"></td> <td class="horario_click" name="37"></td> <td class="horario_click" name="45"></td>
					  </tr>
					  <tr>
					    <th>16:30</th>
					    <td class="horario_click" name="6"></td> <td class="horario_click" name="14"></td> <td class="horario_click" name="22"></td> <td class="horario_click" name="30"></td> <td class="horario_click" name="38"></td> <td class="horario_click" name="46"></td>
					  </tr>
					  <tr>
					    <th>18:30</th>
					    <td class="horario_click" name="7"></td> <td class="horario_click" name="15"></td> <td class="horario_click" name="23"></td> <td class="horario_click" name="31"></td> <td class="horario_click" name="39"></td> <td class="horario_click" name="47"></td>
					  </tr>
					  <tr>
					    <th>20:30</th>
					    <td class="horario_click" name="8"></td> <td class="horario_click" name="16"></td> <td class="horario_click" name="24"></td> <td class="horario_click" name="32"></td> <td class="horario_click" name="40"></td> <td class="horario_click" name="48"></td>
					  </tr>
					  
					</table>
				</div>
				
				
					<br>
	                <h3 class="subt">
                    Lista de Horarios
                    </h3>
                    
                    <!--Tabla-->
                    <table class="table table-bordered table-inverse table-hover table-responsive-lg">
                        <thead class="tittab">
						<tr class="trtab">
                            <th scope="col">Hora</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Materia</th>
                        </tr>  
                        </thead>
						@forelse($horarios as $g)
							<tr>
								<td class="cambio">{{$g->hora}}</td>
								<td>{{$g->aula->curso}}</td>
								<td>{{$g->materia->nombre}}</td>
							</tr>
						@empty
							<li class="texto"><i class="fas fa-calendar-times"></i> NO existen horarios registrados</li>
						@endforelse
                    </table>
                    
 

				<div class="col-12">
					<ul>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection
