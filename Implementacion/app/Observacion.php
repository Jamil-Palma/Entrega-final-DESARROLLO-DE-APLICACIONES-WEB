<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'observacion';
	protected $primaryKey = 'id_obs';
	protected $fillable = [
        'asunto', 'origen', 'destino', 'fecha_envio', 'detalle', 'id_informe'
    ];

    public function informe(){
        return $this->belongsTo('App\Informe', 'id_informe', 'id_informe');
    }
}
