<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informe;
use App\Observacion;
use App\Materia;
use App\Extra;
use App\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MensajeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//auth
    }

    protected function showAll(){
    	$datos = 0;
    	if(Auth::user()->is_admin){
    		$datos = Observacion::all();
        }
    	else{
    		$datos = Observacion::where('origen', Auth::user()->id_usuario)->orWhere('destino', Auth::user()->id_usuario)->get();
        }

    	foreach($datos as $item){
    		$item->destino = User::find($item->destino);
    		$item->origen = User::find($item->origen);
    	}
        return view('mensajes',compact('datos'));
	}
	protected function searchMessage(Request $f){
		$n = 0;
		$n = User::where('apellido','like','%'.$f['nombre'].'%')->first();
		$datos = 0;
		if($n == null){
			abort(403);///no existe el docente que se esta buscando
		}
		//dd($n,Observacion::all());
		$datos = 0;
    	if(Auth::user()->is_admin){
			$datos = Observacion::where('origen',$n->id_usuario)->orWhere('destino',$n->id_usuario)->get();
        }
    	else{
    		$datos = Observacion::where('origen', Auth::user()->id_usuario)->orWhere('destino', Auth::user()->id_usuario)->get();
        }
		foreach($datos as $item){
    		$item->destino = User::find($item->destino);
    		$item->origen = User::find($item->origen);
    	}
		//dd($n,$datos);
        return view('mensajes',compact('datos'));
	}

    protected function newMessage($id){
        $informe = Informe::findOrFail((int)$id);
    	$asunto = 'OBSERVACION '.substr($informe->nombre_informe, 
    									0, strlen($informe->nombre_informe)-5);
    	
    	if(Auth::user()->is_admin){
    		$docentes = User::where('is_admin', 0)
    					->where('id_usuario', $informe->materia->id_usuario)
    					->get();
    		return view('nuevo_mensaje', compact('docentes', 'asunto', 'id'));
    	}
    	else{
    		if($informe->materia->id_usuario == Auth::user()->id_usuario){
				$docentes = User::where('is_admin', 1)->get();
	    		return view('nuevo_mensaje', compact('docentes', 'asunto', 'id'));
    		}
    		else
                abort(403);
    	}
    }

    protected function sendMessage(Request $request){
    	$request->validate([
            'destino' => ['required', 'integer', 'min:1', 'exists:users,id_usuario'],
            'id_informe' => ['required', 'integer', 'min:1', 'exists:informe,id_informe'],
            'mensaje' => ['required', 'string', 'min:5', 'max:200']
    	]);

    	if(Auth::user()->is_admin){
    		$informe = Informe::find($request['id_informe']);
    		$asunto = 'OBSERVACION '.substr($informe->nombre_informe, 
    									0, strlen($informe->nombre_informe)-5);
    		
    		if(User::find($request['destino'])->is_admin)
    			abort(400);
    		if(Informe::find($request['id_informe'])->materia->id_usuario != $request['destino'])
    			return abort(400);

    		$nuevo = new Observacion;
    		$nuevo['asunto'] = $asunto;
    		$nuevo['origen'] = Auth::user()->id_usuario;
    		$nuevo['destino'] = $request['destino'];
    		$nuevo['fecha_envio'] = Carbon::now();
    		$nuevo['detalle'] = $request['mensaje'];
    		$nuevo['id_informe'] = $request['id_informe'];
    		$nuevo->save();
    		return redirect()->route('show.all')->with('mensaje', 'Mensaje enviado exitosamente');
    	}
    	else{
			$informe = Informe::find($request['id_informe']);
    		$asunto = 'OBSERVACION '.substr($informe->nombre_informe, 
    									0, strlen($informe->nombre_informe)-5);
    		
    		if(User::find($request['destino'])->is_admin == 0)
    			abort(400);
    		if($informe->materia->id_usuario != Auth::user()->id_usuario)
    			abort(403);

    		$nuevo = new Observacion;
    		$nuevo['asunto'] = $asunto;
    		$nuevo['origen'] = Auth::user()->id_usuario;
    		$nuevo['destino'] = $request['destino'];
    		$nuevo['fecha_envio'] = Carbon::now();
    		$nuevo['detalle'] = $request['mensaje'];
    		$nuevo['id_informe'] = $request['id_informe'];
    		$nuevo->save();
    		return redirect()->route('show.all')->with('mensaje', 'Mensaje enviado exitosamente');
    	}
    }
}
