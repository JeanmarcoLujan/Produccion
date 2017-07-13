<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compactor extends Model
{
    protected $tabla= 'compactors';

    protected $primaryKey = 'compactor_id';

    public $timestamps=false;

    protected $fillable=[
    	'compactor_id',
    	'gmachine_id',
    	'produccion_moto',
    	'n_rodillos',
    	'ancho_rodillo',
        'espesura_capa',
    	'factor_eficiencia',
    	'velocidad_avance',
        'densidad_material'
    ];
}
