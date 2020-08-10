<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
	protected $primaryKey = 'id_horario';
	protected $fillable = ['hora','id_aula','id_materia'];
	public function aula(){
        return $this->belongsTo('App\Aula', 'id_aula', 'id_aula');
	}
	public function materia(){
		return $this->hasOne('App\Materia','id_materia','id_materia');
	}
}
