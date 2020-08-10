<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Informe;
use App\User;
use Illuminate\Support\Facades\Auth;

class MateriaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // Muestra los registros de todas las materias
    protected function show(){
    	if(Auth::user()->is_admin == 1){
	    	$datos = Materia::all();
            //dd($datos);
	    	$docentes = User::where('is_admin', '0')->get();
	    	return view('mostrar_materias', compact('datos', 'docentes'));
    	}
        else
            abort(403);
    }

    protected function add(Request $request){
    	if(Auth::user()->is_admin == 1){

    		$request->validate([
	            'sigla' => ['required', 'string', 'max:10'],
	            'paralelo' => ['required', 'string', 'max:10', 'alpha'],
	            'nombre' => ['required', 'string', 'max:40'],
	            'id_usuario' => ['required', 'integer', 'min:1', 'exists:users,id_usuario']
        	]);

        	if(User::find($request['id_usuario'])->is_admin == 1)
        		return redirect()->back()->with("alerta", "No se puede asignar materias a este usuario");

        	$temp = Materia::where('sigla', $request['sigla'])
        			->where('paralelo', $request['paralelo'])->count();
        	if($temp != 0)
        		return redirect()->back()->with("alerta", "Ese paralelo ya ha sido agregado");
        	
        	$temp = Materia::where('sigla', $request['sigla'])->count();
        	if($temp != 0){
        		$temp = Materia::where('sigla', $request['sigla'])->first();
        		$temp = $temp->nombre;
        		if($temp != $request['nombre'])
        			return redirect()->back()->with("alerta", "El nombre de la materia no coincide con los registros anteriores. Sugerencia: ".$temp);
        	}

	        $materia = new Materia;
	        $materia['sigla'] = $request ['sigla'];
	        $materia['paralelo'] = $request ['paralelo'];
	        $materia['nombre'] = $request ['nombre'];
	        $materia['id_usuario'] = $request ['id_usuario'];

	        $materia->save();

	    	return redirect()->back()->with("alerta", "Materia agregada exitosamente");
    	}
        else
    	   abort(403);
    }

    protected function delete(Request $request){
    	if(Auth::user()->is_admin == 1){
	    	$request->validate(['id_eliminar' => 'required|integer|min:1']);
			$materia = Materia::findOrFail($request->get('id_eliminar'));
			
            if(Informe::where('id_materia', $request['id_eliminar'])->count() != 0)
                return redirect()->back()->with("alerta", "No es posible eliminar esa materia");
            
	    	$materia->delete();
	    	return redirect()->back()->with("alerta", "Materia eliminado exitosamente");
            
    	}
        else
            abort(403);
    }

    protected function show_info(Request $request){
    	if(Auth::user()->is_admin == 1){
	    	$materia = Materia::findOrFail($request['id_modificar']);
	    	$docentes = User::where('is_admin', '0')->get();
	    	$doc = User::find($materia->id_usuario);
	    	return view('mostrar_mat', ['data' => $materia, 'docentes' => $docentes, 'doc' => $doc]);
    	}
        else 
            abort(403);
    }

    protected function modify(Request $request){
    	if(Auth::user()->is_admin == 1){
    		$request->validate([
	            'sigla2' => ['required', 'string', 'max:10'],
	            'paralelo2' => ['required', 'string', 'max:10', 'alpha'],
	            'nombre2' => ['required', 'string', 'max:40'],
	            'id_usuario2' => ['required', 'integer', 'min:1', 'exists:users,id_usuario'],
	            'id_materia2' => ['required', 'integer', 'min:1', 'exists:materia,id_materia']
        	]);
    		
        	if(User::find($request['id_usuario2'])->is_admin == 1)
        		return redirect()->back()->with("alerta", "No se puede asignar materias a este usuario");

        	$curr = Materia::find($request['id_materia2']);
        	$cnt = Materia::where('sigla', $request['sigla2'])
        			->where('paralelo', $request['paralelo2'])->count();
        	
        	if($cnt != 0){
        		$temp2 = Materia::where('sigla', $request['sigla2'])
        			->where('paralelo', $request['paralelo2'])->first();
        		if($temp2->id_materia != $curr->id_materia)
        			return redirect()->back()->with("alerta", "Ese paralelo ya ha sido agregado");
        	}
        	
        	$cnt = Materia::where('sigla', $request['sigla2'])->count();
        	if($cnt != 0){
        		$temp = Materia::where('sigla', $request['sigla2'])->first();
        		if($temp->id_materia != $curr->id_materia && $temp->nombre != $request['nombre2'])
        			return redirect()->back()->with("alerta", "El nombre de la materia no coincide con los registros anteriores. Sugerencia: ".$temp->nombre);
        	}

	        $curr['sigla'] = $request ['sigla2'];
	        $curr['paralelo'] = $request ['paralelo2'];
	        $curr['nombre'] = $request ['nombre2'];
	        $curr['id_usuario'] = $request ['id_usuario2'];

	        $curr->save();
	    	return redirect()->back()->with("alerta", "Materia modificada exitosamente");
    	}
        else
            abort(403);
    }
}
