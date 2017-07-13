<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loader extends Model
{
    protected $tabla= 'loaders';

    protected $primaryKey = 'loader_id';

    public $timestamps=false;

    protected $fillable=[
    	'loader_id',
    	'gmachine_id',
    	'capacidad_cucharon',
        'distancia_transporte',
    	'aloader_id',
    	'bloader_id',
    	'cloader_id',
    	'dloader_id',
    	'velo_transporte',
    	'eloader_id',
        'factor_eficiencia',
        'densidad_material'
    ];
}
