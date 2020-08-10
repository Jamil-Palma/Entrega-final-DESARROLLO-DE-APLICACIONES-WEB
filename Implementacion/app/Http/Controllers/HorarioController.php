<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; ///para manejo de la bd
use App\Horario; //manejo de MOdel de horario
use App\Materia;
use App\Aula;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\Auth;

class HorarioController extends Controller
{
	public function __construct(){
		$this->middleware('auth');//auth,guest
	}
    public $usuarios = 1;

    protected function show(){
        if(Auth::user()->is_admin != 0){
            return redirect()->route('home')->with("alerta", "No esta autorizado");
        }

        $cursos = DB::table('aula')->get();
        $horarios = Horario::all(); //DB::table('horario')->get();
 		return view('pagina_horario',compact('cursos','horarios'));
    }

    protected function add(Request $request){
        
        $request->validate( [
    		'curso' => ['required',Rule::exists('aula')->where('curso',$request->input('curso')) ],
            'sigla' => ['required',Rule::exists('materia')->where('sigla',$request->input('sigla'))],
    		'paralelo' => ['required',Rule::exists('materia')->where('sigla',$request->input('sigla'))->where('paralelo',$request->input('paralelo')) ],
            'hora' => ['required','integer','min:1','max:48'],
        ] );
        $id_aula = DB::table('aula')->where('curso',$request->input('curso') )->first();
        //dd($id_aula);
        //determina si la materia elegida existe y pertenece al docente logeado
        if(DB::table('materia')->where('id_usuario', Auth::user()->id_usuario)->where('sigla',$request->input('sigla'))->where('paralelo',$request->input('paralelo'))->count() == 0 )
            abort(403);
        
        //determina si el ya existe clases registradas en ese horario y curso
        if(DB::table('horario')->where('id_aula',$id_aula->id_aula)->where('hora',$request->input('hora'))->count() != 0)
            return redirect()->route('show.horario')->with("alerta", "Ese horario ya existe");
        
        $id_materia = DB::table('materia')->where('sigla',$request->input('sigla'))->where('paralelo',$request->input('paralelo'))->first();

        ///determina si la materia elegida ya tiene 2 horaios registrados
        if(DB::table('horario')->where('id_materia',$id_materia->id_materia)->count() == 2 )
            return redirect()->route('show.horario')->with("alerta", "Esta materia ya cuenta con 2 horarios establecidos");
        //dd($id_materia->id_materia);

        //determina si el docente no tiene una materia que dicte registrada en la misma hora
        $conjunto_materias = DB::table('materia')->where('id_usuario', Auth::user()->id_usuario)->get();
        foreach($conjunto_materias as $i){
            if(DB::table('horario')->where('id_materia',$i->id_materia)->where('hora',$request['hora'])->count() != 0)
            return redirect()->route('show.horario')->with("alerta","Ya tienes clases registradas en esa hora, operacion invalida");
        }
        Horario::create([
    		'hora' => $request->input('hora'),
    		'id_aula' => $id_aula->id_aula,
    		'id_materia' => $id_materia->id_materia,
    	]);
    	return redirect()->route('show.horario')->with("alerta", "Horario creado con exito"); 
    }

}
















