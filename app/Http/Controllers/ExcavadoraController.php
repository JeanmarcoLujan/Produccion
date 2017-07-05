<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aexcavator;
use App\Bexcavator;
use App\Cexcavator;

class ExcavadoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function selects($value='')
    {
    	$tipos_carga = Aexcavator::all();
    	$tipos_excavacion = Bexcavator::all();
    	$tipos_tuberia = Cexcavator::all();

    	return response()->json(['tipos_carga'=>$tipos_carga,'tipos_excavacion'=>$tipos_excavacion,'tipos_tuberia'=>$tipos_tuberia]);
    }
}
