<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; ///para manejo de la bd
use App\Aula; //manejo de Model de horario
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class AulaController extends Controller
{
    public function __construct(){
		$this->middleware('auth');//auth,guest
	}

    protected function show(){
        if(Auth::user()->is_admin != 1)
            return redirect()->route('home')->with("alerta", "No esta autorizado");
        $aulas = DB::table('aula')->get();
        return view('pagina_aulas', compact('aulas') );
    }

    protected function add(Request $request){
    	$request->validate([
    		'aulaadd1' => ['required', 'string', 'max:20', 'alpha_num'],
    	]);
        if(DB::table('aula')->where('curso',$request->input('aulaadd1'))->count() != 0){
            return redirect()->route('show.aula')->with("alerta", "Esa aula ya existe");
        }
    	Aula::create([
    		'curso' => strtoupper($request->input('aulaadd1')),
    	]);
    	return redirect()->route('show.aula')->with("alerta", "Aula creada con exito");;
    }

    protected function delete(Request $q){
    	if(Auth::user()->is_admin != 1)
            return redirect()->route('home')->with("alerta", "No esta autorizado");
        $id = $q->id;
        $registro = Aula::findOrFail((int)$id);///findorfile y castear a entero
		$registro->delete();
    	return redirect()->route('show.aula')->with("alerta", "Aula eliminada con exito");;	
    }
}
