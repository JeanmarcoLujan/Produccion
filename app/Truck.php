<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $tabla= 'trucks';

    protected $primaryKey = 'truck_id';

    public $timestamps=false;

    protected $fillable=[
    	'truck_id',
    	'gmachine_id',
    	'potencia_volante',
        'capacidad_coronada',
    	'rend_mecanico',
    	'peso_vacio',
    	'velocidad_maxima',
    	'capacidad_cargador',
    	'tiempo_ciclo',
    	'factor_carga_cucharon',
    	'factor_eficiencia',
    	'peso_material',
    	'coeficiente_rodamiento',
    	'factor_conv_volumen'
    ];
}
