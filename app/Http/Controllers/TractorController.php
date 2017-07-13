<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ramp;
use App\Tractor;
use App\March;

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
        $this->validate($request, [
            'gmachine_id' => 'required',
            'hoja_tapadora' => 'required',
            'capa_tapadora' => 'required|numeric',
            'peso' => 'required|numeric',
            'tiempo_operacion' => 'required|numeric',
            'factor_eficiencia' => 'required|numeric',
            'declive_terreno' => 'required|numeric',
            'densidad_material' => 'required|numeric',
            'distancia_transporte' => 'required|numeric',
            'coef_rodamiento' => 'required|numeric',
            'factor_conversion' => 'required|numeric',
            'coef_adherencia' => 'required|numeric',
            'coef_friccion' => 'required|numeric',
            ]
            
            
        );

    	

        $gmachine_id = $request->gmachine_id;
        $cont = Tractor::where('gmachine_id',$gmachine_id)->count();
        
        if ($cont>0) {
            $tractor = Tractor::where('gmachine_id',$gmachine_id)->get();
            $idd = $tractor[0]['tractor_id'];
            $tra = Tractor::findOrFail($idd);
            $tra->fill($request->all());
            $tra->save();

            return response()->json([
                    "mensaje"=>"Datos editados correctamente"
                ]); 
        }else{
            if ($request->ajax()) {
                Tractor::create($request->all());
                return response()->json([
                    "mensaje"=>"Datos  Registrados Correctamente"
                    ]);        
            }
        }

    }


    public function show($id)
    {
        $tractor = Tractor::where('gmachine_id',$id)->with('ramp')->get();
        $esfuerzo_max = $tractor[0]['peso']*$tractor[0]['coef_adherencia']*1000;

        $vel_exc = March::where('e_avance','>',$esfuerzo_max)->get();

        $resistencia_ofrec = (($tractor[0]['capa_tapadora']*$tractor[0]['densidad_material']*$tractor[0]['coef_friccion'])+($tractor[0]['coef_rodamiento']*$tractor[0]['peso']))*1000;
  
        $vel_trans = March::where('e_avance','>',$resistencia_ofrec)->get();

        $rampa = $tractor[0]['ramp']['rampa'];
        $resistencia_ofrecida_retorno = ($tractor[0]['coef_rodamiento']*1000+10*abs($rampa))*$tractor[0]['peso'];
        
        $vel_retorno = March::where('e_retroceso','>',$resistencia_ofrecida_retorno)->get();
  
        $tiempo_ciclo_min = $tractor[0]['tiempo_operacion']+(15*$tractor[0]['coef_rodamiento']/$vel_exc[(sizeof($vel_exc)-1)]['v_avance'])+(($tractor[0]['distancia_transporte']-15)*$tractor[0]['coef_rodamiento']/$vel_trans[(sizeof($vel_trans)-1)]['v_avance'])+($tractor[0]['distancia_transporte']*$tractor[0]['coef_rodamiento']/$vel_retorno[(sizeof($vel_retorno)-1)]['v_retroceso']);

        $aumento_vol_excavado = $tractor[0]['ramp']['volumen'];
   
        $produccion_max = $tractor[0]['capa_tapadora']*60*$aumento_vol_excavado/$tiempo_ciclo_min;
   
        $produccion_eficiente = $produccion_max*$tractor[0]['factor_eficiencia']*$tractor[0]['factor_conversion'];
        

        return response()->json(['tractor'=>$tractor,'esfuerzo_max'=>$esfuerzo_max,'vel_exc'=>$vel_exc[(sizeof($vel_exc)-1)]['v_avance'],'resistencia_ofrec'=>$resistencia_ofrec,'vel_trans'=>$vel_trans[(sizeof($vel_trans)-1)]['v_avance'],'resistencia_ofrecida_retorno'=>$resistencia_ofrecida_retorno,'vel_retorno'=>$vel_retorno[(sizeof($vel_retorno)-1)]['v_retroceso'],'tiempo_ciclo_min'=>$tiempo_ciclo_min,'aumento_vol_excavado'=>$aumento_vol_excavado,'produccion_max'=>$produccion_max,'produccion_eficiente'=>$produccion_eficiente]);
    }
}
