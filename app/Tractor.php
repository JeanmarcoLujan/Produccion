<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tractor extends Model
{
    protected $tabla= 'tractors';

    protected $primaryKey = 'tractor_id';

    public $timestamps=false;

    protected $fillable=[
    	'tractor_id',
    	'gmachine_id',
    	'capa_tapadora',
        'peso',
    	'tiempo_operacion',
    	'factor_eficiencia',
    	'declive_terreno',
    	'densidad_material',
    	'distancia_transporte',
    	'coef_rodamiento',
        'factor_conversion'
    	'coef_adherencia',
    	'coef_friccion'
    ];
}
