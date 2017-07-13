<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aexcavator;
use App\Bexcavator;
use App\Cexcavator;
use App\Excavator;

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

    public function store(Request $request)
    {
        $this->validate($request, [
                'gmachine_id' => 'required',
                'capacidad_cucharon' => 'required|numeric',
                'aexcavator_id' => 'required|numeric',
                'factor_conver_vol' => 'required|numeric',
                'factor_eficiencia' => 'required|numeric',
                'bexcavator_id' => 'required|numeric',
                'cexcavator_id' => 'required|numeric',
                'profundidad_exc' => 'required|numeric'
            ]
            
            
        );

        $gmachine_id = $request->gmachine_id;
        $cont = Excavator::where('gmachine_id',$gmachine_id)->count();
        
        if ($cont>0) {
            $excavator = Excavator::where('gmachine_id',$gmachine_id)->get();
            $idd = $excavator[0]['excavator_id'];
            $ex = Excavator::findOrFail($idd);
            $ex->fill($request->all());
            $ex->save();

            return response()->json([
                    "mensaje"=>"Datos editados correctamente"
                ]); 
        }else{
            if ($request->ajax()) {
                Excavator::create($request->all());
                return response()->json([
                    "mensaje"=>"Datos  Registrados Correctamente"
                    ]);        
            } 
        }
    }

    public function show($id)
    {
        $excavadora = Excavator::where('gmachine_id',$id)->get();

      

        $tolva =  Aexcavator::where('aexcavator_id',$excavadora[0]['aexcavator_id'])->get();
        //echo $tolva[0]['valor'].'<br>';

        $tiempo_ciclo =  Bexcavator::where('bexcavator_id',$excavadora[0]['bexcavator_id'])->get();

        $produccion_horaria = $excavadora[0]['capacidad_cucharon']*$tolva[0]['valor']*($excavadora[0]['factor_conver_vol'])*3600*$excavadora[0]['factor_eficiencia']/$tiempo_ciclo[0]['valor'];


         $largura_min =  Cexcavator::where('cexcavator_id',$excavadora[0]['cexcavator_id'])->get();

        $profundidad = $excavadora[0]['profundidad_exc'];
        $produccion_lineal = $produccion_horaria/($largura_min[0]['longitud']*$profundidad*1);

        $produccion_tn = $produccion_horaria*$excavadora[0]['densidad_material'];
      
        

        return response()->json(['excavadora'=>$excavadora,'tolva'=>$tolva[0]['valor'],'tiempo_ciclo'=>$tiempo_ciclo[0]['valor'],'produccion_horaria'=>$produccion_horaria,'largura_min'=>$largura_min[0]['longitud'],'profundidad'=>$profundidad,'produccion_lineal'=>$produccion_lineal,'produccion_tn'=>$produccion_tn]);
    }
}
