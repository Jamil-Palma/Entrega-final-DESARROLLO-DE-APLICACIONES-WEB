<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $table = 'extra';
    protected $primaryKey = 'id';
	protected $fillable = [
        'anuncio', 'fecha_limite', 'semestre'
    ];
}
