<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grader;

class MotoniveladoraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'gmachine_id' => 'required',
            'velocidad_avance' => 'required|numeric',
            'velocidad_retroceso' => 'required|numeric',
            'velocidad_primera' => 'required|numeric',
            'ancho_lamina' => 'required|numeric',
            'factor_eficiencia' => 'required|numeric',
            'ancho' => 'required|numeric',
            'longitud_regularizada' => 'required|numeric',
            'espesura' => 'required|numeric',
            'densidad_material'=> 'required|numeric'
            ]
           
            
        );

        

        $gmachine_id = $request->gmachine_id;
        $cont = Grader::where('gmachine_id',$gmachine_id)->count();
       
        if ($cont>0) {
            $grader = Grader::where('gmachine_id',$gmachine_id)->get();
            $idd = $grader[0]['grader_id'];
            $gra = Grader::findOrFail($idd);
            $gra->fill($request->all());
            $gra->save();

            return response()->json([
                    "mensaje"=>"Datos editados correctamente"
                ]); 
        }else{
            if ($request->ajax()) {
                Grader::create($request->all());
                return response()->json([
                    "mensaje"=>"Datos  Registrados Correctamente"
                    ]);        
            } 
        }
    }

    public function show($id)
    {
    	$motoniv = Grader::where('gmachine_id',$id)->get();
    	$num_pasadas = $motoniv[0]['ancho']*4/$motoniv[0]['ancho_lamina'];
    	$tiempo_efectivo  = (($motoniv[0]['longitud_regularizada']*0.06/$motoniv[0]['velocidad_avance'])+($motoniv[0]['longitud_regularizada']*0.06/$motoniv[0]['velocidad_retroceso']))*($num_pasadas/$motoniv[0]['factor_eficiencia']);
    	$produccion = ($motoniv[0]['ancho']*$motoniv[0]['longitud_regularizada']*$motoniv[0]['espesura']*60)/$tiempo_efectivo;
    	$area_regularizada = $produccion/$motoniv[0]['espesura'];
    	$area_trabajada = $motoniv[0]['ancho_lamina']*$motoniv[0]['velocidad_primera']*$motoniv[0]['factor_eficiencia']*1000/10;
    	$numero_unidades = $area_regularizada/$area_trabajada;
        $produccion_tn = $produccion*$motoniv[0]['densidad_material'];

    	return response()->json(['motoniv'=>$motoniv,'num_pasadas'=>$num_pasadas,'tiempo_efectivo'=>$tiempo_efectivo,'produccion'=>$produccion,'area_regularizada'=>$area_regularizada,'area_trabajada'=>$area_trabajada,'numero_unidades'=>round($numero_unidades),'produccion_tn'=>$produccion_tn]);
    }
}
