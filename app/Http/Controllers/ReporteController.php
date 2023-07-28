<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Ruta;

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

        return view('reportes.empleados.index', ['rutas' => $rutas, 'ruta' => $ruta, 'area' => $area]);
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
                $empleadosRep = DB::table('empleados')->whereIn('_id', $asigRutas['id_empleado'])->where('area', $area)->get();        
            } else {
                $empleadosRep = DB::table('empleados')->whereIn('_id', $asigRutas['id_empleado'])->get();
            }
            //$empleadosRep = $asigRutas['id_empleado'];
        } else if ($area != '') {
            //empleados por area
            $empleadosRep = DB::table('empleados')->where('area', $area)->get();
        } else {
            $empleadosRep = DB::table('empleados')->get();
        }

        return view('reportes.empleados.index', ['empleadosRep' => $empleadosRep, 'rutas' => $rutas, 'areas' => $areas, 'rutaDb' => $rutaDb, 'area' => $area, 'ruta' => $ruta]);
    }
}
