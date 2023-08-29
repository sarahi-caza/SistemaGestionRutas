<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Ruta;
use App\Models\Chofer;
use App\Models\Empleado;
use App\Models\ConfirmacionRuta;
use PDF;

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

        $empleadosRep=$this->obtenerReporteEmpleado ($area, $ruta, $estado);
        return view('reportes.empleados.index', ['empleadosRep' => $empleadosRep, 'rutas' => $rutas, 'areas' => $areas, 'rutaDb' => $rutaDb, 'area' => $area, 'ruta' => $ruta, 'estado' => $estado]);
    }

    public function obtenerReporteEmpleado ($area, $ruta, $estado)
    {
        $rutas = DB::table('rutas')->get();
       
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

        return $empleadosRep;
    }
    
    public function crearEmpleadoPDF($area='area', $ruta='ruta', $estado='estado'){
        if($area=='area'){
            $area='';
        }
        if($ruta=='ruta'){
            $ruta='';
        }
        if($estado=='estado'){
            $estado='';
        }
        $empleadosRep=$this->obtenerReporteEmpleado ($area, $ruta, $estado);
        $areas = [
            'TWR' => 'TWR Torre de control',
            'APP' => 'APP Vigilancia Radar',
            'MET' => 'MET Meteorología',
            'OPS' => 'OPS Operaciones',
            'AIS' => 'AIS Información de Vuelo',
        ];
        $rutaDb=null;
        if ($ruta != '') {
            $rutaDb = DB::table('rutas')->where('_id', $ruta)->first();
        }
        view()->share('empleadosRep', $empleadosRep);
        view()->share('rutaDb', $rutaDb);
        view()->share('areas', $areas);
        view()->share('area', $area);
        
        $pdf = PDF::loadView('reportes.empleados.reporte', (array) $empleadosRep);
        return $pdf->download('reporteEmpleados.pdf');
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
        
        $choferesRep=$this->obtenerReporteChofer($sector, $estado);
        
        return view('reportes.choferes.index', ['choferesRep' => $choferesRep, 'sector' => $sector, 'sectores' => $sectores, 'estado' => $estado]);
    }

    public function obtenerReporteChofer ($sector, $estado)
    {
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
        return $choferesRep;
    }
    
    public function crearChoferPDF($sector='sector', $estado='estado'){
        if($sector=='sector'){
            $sector='';
        }
        if($estado=='estado'){
            $estado='';
        }
        $choferesRep=$this->obtenerReporteChofer($sector, $estado);
        view()->share('choferesRep', $choferesRep);
        $pdf = PDF::loadView('reportes.choferes.reporte', (array) $choferesRep);
        return $pdf->download('reporteChofer.pdf');
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

        $confirmRuta=$this->obtenerReporteConfirmacion($semana, $ruta);
        $empleados = DB::table('empleados')->get();
        $empleadosArray = [];
        foreach($empleados as $emp){
            $empleadosArray = array_merge($empleadosArray, array((string)$emp['_id'] => $emp['nombre'].' '.$emp['apellido']));
        }
        $rutasArray=$this->obtenerListaRutasConfirmacion($rutas);
        
        return view('reportes.confirmacion.index', ['rutas' => $rutas, 'ruta' => $ruta, 'semanas' => $semanas, 'semana' => $semana, 'confirmRuta' => $confirmRuta, 'empleadosArray' => $empleadosArray, 'rutasArray' => $rutasArray]);
    }
    
    public function obtenerReporteConfirmacion ($semana, $ruta)
    {
        $rutas = DB::table('rutas')->get();
        $semanas= DB::table('horarios')->select('fecha')->distinct()->get();
        
        if ($ruta != ''){
            $rutaDb = DB::table('rutas')->where('_id', $ruta)->first();
            $asigRuta = DB::table('asig_rutas')->where('id_ruta', $rutaDb['_id'])->first();
             
            $confirmRuta = ConfirmacionRuta::where('id_asig_ruta', $asigRuta['_id'])->where('semana',$semana)->get();
            
        }else{
            $confirmRuta = ConfirmacionRuta::where('semana',$semana)->get();
        }
        return $confirmRuta;
    }

    public function obtenerListaRutasConfirmacion($rutas){
        
        $asigRutas = DB::table('asig_rutas')->get();
        $rutasArray = [];
        foreach($asigRutas as $ar){
            foreach ($rutas as $rut) {
                if($rut['_id'] == $ar['id_ruta']){
                    $rutasArray = array_merge($rutasArray, array((string)$ar['_id'] => $rut['nombre']));
        
                }
            }
        }
        return $rutasArray;
    }


    public function crearConfirmacionPDF($semana, $ruta='ruta'){
        $semana=str_replace('.','/',$semana);
        if($ruta=='ruta'){
            $ruta='';
        }
        $rutas = DB::table('rutas')->get();
        $confirmRuta=$this->obtenerReporteConfirmacion($semana, $ruta);
        $empleados = DB::table('empleados')->get();
        $empleadosArray = [];
        foreach($empleados as $emp){
            $empleadosArray = array_merge($empleadosArray, array((string)$emp['_id'] => $emp['nombre'].' '.$emp['apellido']));
        }
        $rutasArray=$this->obtenerListaRutasConfirmacion($rutas);
        view()->share('confirmRuta', $confirmRuta);
        view()->share('empleadosArray', $empleadosArray);
        view()->share('rutasArray', $rutasArray);
        view()->share('semana', $semana);
        $pdf = PDF::loadView('reportes.confirmacion.reporte', (array) $confirmRuta);
        
        return $pdf->download('reporteConfirmacion.pdf');
    }
    
}
