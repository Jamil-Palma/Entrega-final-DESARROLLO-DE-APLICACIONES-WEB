<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Extra;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if(Extra::all()->count() == 0){
            $nuevo = new Extra;
            $nuevo['anuncio'] = "No hay anuncios aun.";
            $nuevo['fecha_limite'] = Carbon::now();
            $nuevo['semestre'] = "I-2020";
            $nuevo->save();
        }
        $anuncio = Extra::all()->first();
        $hora = Carbon::now()->toDateTimeString();
        $nombre = 'Ing. '.Auth::user()->nombre.' '.Auth::user()->apellido;
        return view('home', compact('anuncio', 'hora', 'nombre'));
    }
}
