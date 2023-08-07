<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Ruta;
use App\Models\Chofer;
use App\Models\Empleado;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEmpleado(): View
    {
        $rutas = DB::table('rutas')->get();
        $ruta='';
        $area='';
        $estado='';

        return view('reportes.empleados.index', ['rutas' => $rutas, 'ruta' => $ruta, 'area' => $area, 'estado' => $estado]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function reporteEmpleado (Request $request): View
    {
        $rutas = DB::table('rutas')->get();
        //filtros
        $area = $request->input('area');
        $ruta = $request->input('ruta');
        $estado = $request->input('estado');

        $areas = [
            'TWR' => 'TWR Torre de control',
            'APP' => 'APP Vigilancia Radar',
            'MET' => 'MET Meteorología',
            'OPS' => 'OPS Operaciones',
            'AIS' => 'AIS Información de Vuelo',
            ];
        
            $rutaDb=null;
        //empleados por ruta
        if ($ruta != '') {
            $rutaDb = DB::table('rutas')->where('_id', $ruta)->first();
            $asigRutas = DB::table('asig_rutas')->where('id_ruta', $rutaDb['_id'])->first();
           if ($area != '') {
                if($estado != ''){
                    $empleadosRep = Empleado::whereIn('_id', $asigRutas['id_empleado'])->where('area', $area)->get();
                }else{
                    $empleadosRep = Empleado::withTrashed()->whereIn('_id', $asigRutas['id_empleado'])->where('area', $area)->get();
                }
            } else {
                if($estado != ''){
                    $empleadosRep = Empleado::whereIn('_id', $asigRutas['id_empleado'])->get();
                }else{
                    $empleadosRep = Empleado::withTrashed()->whereIn('_id', $asigRutas['id_empleado'])->get();
                }
                
            }
        } else if ($area != '') {
            //empleados por area
            if($estado != ''){
                $empleadosRep = Empleado::where('area', $area)->get();
            }else{
                $empleadosRep = Empleado::withTrashed()->where('area', $area)->get();
            }
            
        } else {
            if($estado !=''){
                $empleadosRep = Empleado::get();
            }else{
                $empleadosRep = Empleado::withTrashed()->get();
            }
            
        }

        return view('reportes.empleados.index', ['empleadosRep' => $empleadosRep, 'rutas' => $rutas, 'areas' => $areas, 'rutaDb' => $rutaDb, 'area' => $area, 'ruta' => $ruta, 'estado' => $estado]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexChofer(): View
    {
        $sector='';
        $estado='';
                
        return view('reportes.choferes.index', ['sector' => $sector, 'estado' => $estado]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function reporteChofer (Request $request): View
    {
        //filtros
        $sector = $request->input('sector');
        $estado = $request->input('estado');

        $sectores = [
            'Norte' => 'Norte',
            'Sur' => 'Sur',
            'Centro' => 'Centro',
            'Valle' => 'Valle',
            ];
        
        //choferes por sector
        if ($sector != '') {
            if($estado != ''){
                $choferesRep= Chofer::where('sector', $sector)->get();
            }else{
                $choferesRep= Chofer::where('sector', $sector)->withTrashed()->get();
            }   
        }else{
            if($estado != ''){
                $choferesRep= Chofer::get();
            }else{
                $choferesRep = Chofer::withTrashed()->get();
            }
        }
        
        return view('reportes.choferes.index', ['choferesRep' => $choferesRep, 'sector' => $sector, 'sectores' => $sectores, 'estado' => $estado]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexConfirmacion(): View
    {
        $rutas = DB::table('rutas')->get();
        $ruta='';
        $semanas= DB::table('horarios')->select('fecha')->distinct()->get();
        $semana='';

        return view('reportes.confirmacion.index', ['rutas' => $rutas, 'ruta' => $ruta, 'semanas' => $semanas, 'semana' => $semana]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function reporteConfirmacion (Request $request): View
    {
        $rutas = DB::table('rutas')->get();
        $ruta=$request->input('ruta');
        $semanas= DB::table('horarios')->select('fecha')->distinct()->get();
        $semana=$request->input('semana');

        return view('reportes.confirmacion.index', ['rutas' => $rutas, 'ruta' => $ruta, 'semanas' => $semanas, 'semana' => $semana]);
    
    }

}
