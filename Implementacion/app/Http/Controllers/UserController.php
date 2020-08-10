<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Materia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    protected function show(){
    	if(Auth::user()->is_admin == 1){
	    	$datos = User::all();	// Retorna un objeto de Eloquent
	    	return view('gestionar_usuario', compact('datos'));
    	}
        else
            abort(403);
    }

    protected function delete_user(Request $request){
    	if(Auth::user()->is_admin == 1){
	    	$request->validate(['id_eliminar' => 'required|integer|min:1']);
	    	$user = User::findOrFail($request->get('id_eliminar'));
	    	if($user->id_usuario == Auth::user()->id_usuario || $user->is_admin == 1){
	    		return redirect()->back()->with("alerta", "No es posible eliminar ese usuario");
	    	}

            if(Materia::where('id_usuario', $request['id_eliminar'])->count() != 0)
                return redirect()->back()->with("alerta", "No se puede eliminar al usuario debido a que tiene registradas materias");

	    	$user->delete();
	    	return redirect()->back()->with("alerta", "Usuario eliminado exitosamente");
	    }
        else
            abort(403);
    }

    protected function show_info(){
    	return view('mostrar_cuenta');
    }
    
    protected function modify_user(Request $request){
    	$request->validate([
            'ci' => ['required', 'string', 'max:20'],
            'nombre' => ['required', 'string', 'max:30'],
            'apellido' => ['required', 'string', 'max:30'],
            'cel' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:30'],
            'user_name' => ['required', 'string', 'max:20', Rule::unique('users')->ignore(Auth::user()->user_name, 'user_name')],
            'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed']
        ]);

        $user = Auth::user();
        $user['ci'] = $request ['ci'];
        $user['nombre'] = $request ['nombre'];
        $user['apellido'] = $request ['apellido'];
        $user['cel'] = $request ['cel'];
        $user['email'] = $request ['email'];
        $user['user_name'] = $request ['user_name'];
        $user['password'] = Hash::make($request['password']);

        $user->save();

    	return redirect()->route('show.info')->with("alerta", "Usuario modificado exitosamente");
    }
}
