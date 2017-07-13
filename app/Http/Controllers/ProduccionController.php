<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function mostrar($id,$type)
    {
    	if ($type == '1' || $type == '2') {
            if ($type == '1') {
                $machine = 'Tractor de orugas';
            }else{
                $machine = 'Tractor sobre ruedas';
            }
    		return view("produccion.tipos.tractor", compact('machine'));
    	}else if ($type == '3' || $type == '4') {
            if ($type == '3') {
                $machine = 'Cargador frontal de ruedas';
            }else{
                $machine = 'Cargador frontal de orugas';
            }
    		return view("produccion.tipos.cargador", compact('machine'));
    	}else if ($type == '5' || $type == '6' || $type=='7') {
            if ($type == '5') {
                $machine = 'Excavadora sobre ruedas';
            }else if ($type == '6') {
                $machine = 'Excavadora sobre orugas';
            }else{
                $machine = 'Retroexcavadora';
            }
    		return view("produccion.tipos.excavadora", compact('machine'));
    	}else if ($type == '8') {
    		return view("errors.503");
    	}else if ($type == '9') {
    		return view("produccion.tipos.motoniveladora");
    	}else if ($type == '10') {
    		return view("produccion.tipos.compactadora");
    	}else{
    		return view("errors.503");
    	}
    }
}
