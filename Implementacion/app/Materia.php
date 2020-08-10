<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';
	protected $primaryKey = 'id_materia';
	
	protected $fillable = [
        'sigla', 'paralelo', 'nombre', 'id_usuario'
    ];

    public function usuario(){
        return $this->belongsTo('App\User', 'id_usuario', 'id_usuario');
    }
}
