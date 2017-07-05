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
    	if ($type == '1' || $type == '7') {
    		return view("produccion.tipos.tractor");
    	}else if ($type == '2' || $type == '8') {
    		return view("produccion.tipos.cargador");
    	}else if ($type == '3' || $type == '9' || $type=='10') {
    		return view("produccion.tipos.excavadora");
    	}else if ($type == '4') {
    		return view("produccion.tipos.camion");
    	}else if ($type == '5') {
    		return view("produccion.tipos.motoniveladora");
    	}else if ($type == '6') {
    		return view("produccion.tipos.compactadora");
    	}else{
    		return view("errors.503");
    	}
    }
}
