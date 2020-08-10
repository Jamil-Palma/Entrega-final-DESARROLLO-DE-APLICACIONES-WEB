<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informe;
use App\Materia;
use App\Extra;
use App\Observacion;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class InformeController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }

    protected function show(){
	    $datos = Informe::all();
		$size = count($datos);
		$enlaces[0] = -1;
		for($i = 0; $i < $size; $i++){
			if(Observacion::where('id_informe', $datos[$i]->id_informe)->exists()){
				$enlaces[$datos[$i]->id_informe] 
									= Observacion::where('id_informe', $datos[$i]->id_informe)
									->latest()
									->get()[0]
									->id_obs;
			}
			else
				$enlaces[$datos[$i]->id_informe] = -1;
		}

		foreach ($datos as $item)
			$item = $item->materia->usuario;
		
    	if(Auth::user()->is_admin == 1){
    		return view('hist_envios', compact('datos', 'enlaces'));
    	}
    	else{
    		// $materias -> Materias que dicta el docente
    		// $datos -> Informes que envio el usuario
    		$materias = Materia::where('id_usuario', Auth::user()->id_usuario)->get();
    		$datos = $datos->filter(function($item){
	    		$materias = Materia::where('id_usuario', Auth::user()->id_usuario)->get();
    			foreach($materias as $mat){
    				if($mat->id_materia == $item->id_materia)
    					return true;
    			}
    			return false;
    		});
    		return view('hist_envios',compact('materias', 'datos', 'enlaces'));
    	}
    }
    
    // Las funciones de adicion reciben el id de la materia y el archivo a subir
    protected function addPlan(Request $request){
    	if(Auth::user()->is_admin == 0){
	    	$request->validate([
		            'id_materia' => ['required', 'integer', 'min:1', 'exists:materia,id_materia'],
		            'archivo' => ['required', 'mimes:docx', 'file']
	        	]);
	    	// Verificando si ese usuario realmente esta encargado de esa materia
	    	$enabled = Materia::where('id_usuario', Auth::user()->id_usuario)
	    						->where('id_materia', $request['id_materia'])->exists();
			if($enabled == true){
				// Almacena los datos de la materia a guardar
				$ans = Materia::find($request['id_materia']);

				if(Extra::all()->count() == 0)
					return redirect()->back()->with("alerta", "Primero el administrador debe definir una fecha limite");
				$sem = Extra::all()->first()->semestre;
				$limit = Extra::all()->first()->fecha_limite;
				$time_current = Carbon::now();
				if($time_current->lte($limit)){
			    	$nombre = "PLAN DE ESTUDIOS ".$ans->sigla.' '.$ans->paralelo.' '.$sem.".docx";
					$registro = new Informe;
					$registro['tipo'] = "PLAN DE ESTUDIOS";
					$registro['fecha_envio'] = $time_current;
					$registro['nombre_informe'] = $nombre;
					$registro['id_materia'] = $request['id_materia'];
					$registro->save();
			    	Storage::putFileAs('public', $request->archivo, $nombre);
					return redirect()->back()->with("alerta", "Archivo enviado exitosamente");
				}
				else
					return redirect()->back()->with("alerta", "Muy tarde, ya te jodiste");
			}
			else
				abort(403);
    	}
    	else
    		abort(403);
    }

    protected function addInforme(Request $request){
    	if(Auth::user()->is_admin == 0){
	    	$request->validate([
		            'id_materia' => ['required', 'integer', 'min:1', 'exists:materia,id_materia'],
		            'archivo' => ['required', 'mimes:docx', 'file']
	        	]);
	    	// Verificando si ese usuario realmente esta encargado de esa materia
	    	$enabled = Materia::where('id_usuario', Auth::user()->id_usuario)
	    						->where('id_materia', $request['id_materia'])->exists();
			if($enabled == true){
				$ans = Materia::find($request['id_materia']);	// Almacena los datos de la materia a guardar
				if(Extra::all()->count() == 0)
					return redirect()->back()->with("alerta", "Primero el administrador debe definir una fecha limite");
				$sem = Extra::all()->first()->semestre;
				$limit = Extra::all()->first()->fecha_limite;
				$time_current = Carbon::now();
				if($time_current->lte($limit)){
			    	$nombre = "INFORME DE ACTIVIDADES ".$ans->sigla.' '.$ans->paralelo.' '.$sem.".docx";
					$registro = new Informe;
					$registro['tipo'] = "INFORME DE ACTIVIDADES";
					$registro['fecha_envio'] = Carbon::now();
					$registro['nombre_informe'] = $nombre;
					$registro['id_materia'] = $request['id_materia'];
					$registro->save();
			    	Storage::putFileAs('public', $request->archivo, $nombre);
					return redirect()->back()->with("alerta", "Archivo enviado exitosamente");
				}
				else
					return redirect()->back()->with("alerta", "Muy tarde, ya te jodiste");
			}
			else
				abort(403);
    	}
    	else
    		abort(403);
    }

    // Descarga un archivo con una "id"
    protected function download($id){
    	if((int)$id == -1)
    		return Storage::disk('public')->download("INFORME DE ACTIVIDADES BASE.docx");
    	else if((int)$id == -2)
    		return Storage::disk('public')->download("PLAN DE ESTUDIOS BASE.docx");
    	$item = Informe::findOrFail((int)$id);
    	// Obtiene el registro del actual titular de la materia del informe
    	$user = $item->materia->usuario; 
    	if(Auth::user()->is_admin == 1)
    		return Storage::disk('public')->download($item->nombre_informe);
    	else if($user->id_usuario == Auth::user()->id_usuario)
    		return Storage::disk('public')->download($item->nombre_informe);
    	else
    		abort(403);
    }

    // Actualiza anuncios, semestre y fecha limite de envio de informes
    protected function updateExtra(Request $request){
    	if(Auth::user()->is_admin == 1){
    		$now = Carbon::now()->toDateTimeString();
	    	$request->validate([
		            'anuncio' => ['required', 'string', 'max:200'],
		            'fecha' => ['required', 'date', 'after:'.$now],
		            'semestre' => ['required', 'string']
	        	]);

	    	if(Extra::all()->count() == 0){
	            $nuevo = new Extra;
	            $nuevo['anuncio'] = $request['anuncio'];
		    	$nuevo['fecha_limite'] = Carbon::parse($request['fecha']);
		    	$nuevo['semestre'] = $request['semestre'];
		    	$nuevo->save();
        	}
        	else{
        		$nuevo = Extra::all()->first();
        		$nuevo['anuncio'] = $request['anuncio'];
		    	$nuevo['fecha_limite'] = Carbon::parse($request['fecha']);
		    	$nuevo['semestre'] = $request['semestre'];
		    	$nuevo->save();		
        	}
	    	
	    	return redirect()->route('home')->with("alerta", "anuncio modificado correctamente");
    	}
    	else
    		abort(403);
    }
    
    protected function showExtra(){
    	if(Auth::user()->is_admin == 1)
    		return view('mostrar_extra');
    	else
    		abort(403);
    }
}
