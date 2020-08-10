<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = 'informe';
	protected $primaryKey = 'id_informe';
	
	protected $fillable = [
        'tipo', 'fecha_envio', 'nombre_informe', 'id_materia'
    ];

    public function materia(){
        return $this->belongsTo('App\Materia', 'id_materia', 'id_materia');
    }

    public function observacion(){
        return $this->hasMany('App\Observacion', 'id_informe', 'id_informe');
    }
}
