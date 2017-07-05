<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aloader;
use App\Bloader;
use App\Cloader;
use App\Dloader;
use App\Eloader;

class CargadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function selects()
    {
    	$tipos_carga = Aloader::all();
    	$tamaños_material = Bloader::all();
    	$tiempos_apilacion = Cloader::all();
    	$tiempos_diversos = Dloader::all();
    	$tipos_material = Eloader::all();

    	return response()->json(['tipos_carga'=>$tipos_carga,'tamaños_material'=>$tamaños_material,'tiempos_apilacion'=>$tiempos_apilacion,'tiempos_diversos'=>$tiempos_diversos,'tipos_material'=>$tipos_material]);
    }
}
