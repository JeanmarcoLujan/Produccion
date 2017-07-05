<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grader extends Model
{
    protected $tabla= 'graders';

    protected $primaryKey = 'grader_id';

    public $timestamps=false;

    protected $fillable=[
    	'grader_id',
    	'gmachine_id',
    	'velocidad_avance',
        'velocidad_retroceso',
    	'ancho_lamina',
    	'factor_eficiencia',
    	'ancho',
    	'longitud_regularizada',
    	'espesura'
    ];
}
