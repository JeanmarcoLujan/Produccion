<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ramp;
use App\Tractor;

class TractorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function selects($value='')
    {
    	$rampas = Ramp::all();
    	return response()->json(['rampas'=>$rampas]);
    }

    public function store(Request $request)
    {
    	if ($request->ajax()) {
            Tractor::create($request->all());
            return response()->json([
                "mensaje"=>"Datos  Registrados Correctamente"
            ]);        
        }  
    }
}
