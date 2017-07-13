<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aloader;
use App\Bloader;
use App\Cloader;
use App\Dloader;
use App\Eloader;
use App\Loader;
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'gmachine_id' => 'required',
            'capacidad_cucharon' => 'required|numeric',
            'distancia_transporte' => 'required|numeric',
            'aloader_id' => 'required|numeric',
            'bloader_id' => 'required|numeric',
            'cloader_id' => 'required|numeric',
            'dloader_id' => 'required|numeric',
            'velo_transporte' => 'required|numeric',
            'eloader_id' => 'required|numeric',
            'factor_eficiencia'=>'required|numeric',
            'densidad_material'=>'required|numeric'
            ]
           
            
        );

        $gmachine_id = $request->gmachine_id;
        $loader = Loader::where('gmachine_id',$gmachine_id)->count();
        if ($loader>0) {
            
            $laderr = Loader::where('gmachine_id',$gmachine_id)->get();
            $idd = $laderr[0]['loader_id'];
            $lo = Loader::findOrFail($idd);
            $lo->fill($request->all());
            $lo->save();

            return response()->json([
                    "mensaje"=>"Datos editados correctamente"
                ]); 
        }else{
             if ($request->ajax()) {
                Loader::create($request->all());
                return response()->json([
                    "mensaje"=>"Datos  Registrados Correctamente"
                    ]);        
            } 
        }

         
    }

    public function show($id)
    {
        $cargador = Loader::where('gmachine_id',$id)->get();

        $factor_tolva = Aloader::where('aloader_id',$cargador[0]['aloader_id'])->get();

        $tiempo_tamaño_material = Bloader::where('bloader_id',$cargador[0]['bloader_id'])->get();

        $tiempo_altura_material = Cloader::where('cloader_id',$cargador[0]['cloader_id'])->get();

        $tiempo_factores = Dloader::where('dloader_id',$cargador[0]['dloader_id'])->get();

        $tiempo_carga = Eloader::where('eloader_id',$cargador[0]['eloader_id'])->get();

        $factor_eficiencia = $cargador[0]['factor_eficiencia'];

        $tiempo_ciclo_basico = $tiempo_carga[0]['valor']+0.22+0.05+(2*$cargador[0]['distancia_transporte']*0.06/$cargador[0]['velo_transporte']);

        $tiempo_ciclo_total = $tiempo_ciclo_basico+$tiempo_tamaño_material[0]['valor']+$tiempo_altura_material[0]['valor']+$tiempo_factores[0]['valor'];

        $produccion = $cargador[0]['capacidad_cucharon']*0.76*$factor_tolva[0]['valor']*$factor_eficiencia*$cargador[0]['distancia_transporte']/$tiempo_ciclo_total;
        
        $produccion_tn = $produccion*$cargador[0]['densidad_material'];

        return response()->json(['cargador'=>$cargador,'factor_tolva'=>$factor_tolva[0]['valor'],'tiempo_tamaño_material'=>$tiempo_tamaño_material[0]['valor'],'tiempo_altura_material'=>$tiempo_altura_material[0]['valor'],'tiempo_factores'=>$tiempo_factores[0]['valor'],'factor_eficiencia'=>$factor_eficiencia,'tiempo_carga'=>$tiempo_carga[0]['valor'],'tiempo_ciclo_basico'=>$tiempo_ciclo_basico,'tiempo_ciclo_total'=>$tiempo_ciclo_total,'produccion'=>$produccion,'produccion_tn'=>$produccion_tn]);
    }
}
