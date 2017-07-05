<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excavator extends Model
{
    protected $tabla= 'excavators';

    protected $primaryKey = 'excavator_id';

    public $timestamps=false;

    protected $fillable=[
    	'excavator_id',
    	'gmachine_id',
    	'capacidad_cucharon',
        'aexcavator_id',
    	'factor_conver_vol',
    	'factor_eficiencia',
    	'bexcavator_id',
    	'cexcavator_id'
    ];
}
