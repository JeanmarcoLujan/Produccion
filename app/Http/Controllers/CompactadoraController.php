<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compactor;

class CompactadoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'gmachine_id' => 'required',
            'produccion_moto' => 'required|numeric',
            'n_rodillos' => 'required|numeric',
            'ancho_rodillo' => 'required|numeric',
            'espesura_capa' => 'required|numeric',
            'factor_eficiencia' => 'required|numeric',
            'velocidad_avance' => 'required|numeric',
            'densidad_material' => 'required|numeric'
            ]
            
        );

        


        $gmachine_id = $request->gmachine_id;
        $cont = Compactor::where('gmachine_id',$gmachine_id)->count();
        
        if ($cont>0) {
            $compactadora = Compactor::where('gmachine_id',$gmachine_id)->get();
            $idd = $compactadora[0]['compactor_id'];
            $compac = Compactor::findOrFail($idd);
            $compac->fill($request->all());
            $compac->save();

            return response()->json([
                    "mensaje"=>"Datos editados correctamente"
                ]); 
        }else{
            
        	if ($request->ajax()) {
        		Compactor::create($request->all());
        		return response()->json([
        			"mensaje"=>"Datos  Registrados Correctamente"
        			]);        
        	} 
        }
    }

    public function show($id)
    {

    	$compactadora = Compactor::where('gmachine_id',$id)->get();
    	$ancho_rodillo = 2*$compactadora[0]['ancho_rodillo'];
    	$produccion = ( (($ancho_rodillo*$compactadora[0]['espesura_capa']*$compactadora[0]['velocidad_avance']*$compactadora[0]['factor_eficiencia'])/(100*$compactadora[0]['n_rodillos']))*1000);
    	$numero_unidades = ceil( $compactadora[0]['produccion_moto']/$produccion);
        $produccion_tn = $produccion*$compactadora[0]['densidad_material'];


    	return response()->json(['compactadora'=>$compactadora,'ancho_rodillo'=>$ancho_rodillo,'produccion'=>$produccion,'numero_unidades'=>$numero_unidades,'produccion_tn'=>$produccion_tn]);
    }
}
