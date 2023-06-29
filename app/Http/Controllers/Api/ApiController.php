<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmpleadoResource;
use App\Models\Horario;
use App\Models\AsignacionRuta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function apiLogin(Request $request)
    {

        $empleado = DB::table('empleados')->where('cedula',$request->cedula)->first();
        $ubicacion = null;
        
        if ($empleado && $empleado['clave'] == $request->clave ) {
            if(isset($empleado['ubicacion'])){
                $ubicacion = $empleado['ubicacion'];
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Empleado encontrado',
                'id_usuario' => (string) $empleado['_id'],
                'nombre' => $empleado['nombre'],
                'apellido' => $empleado['apellido'],
                'cedula' => $empleado['cedula'],
                'celular' => $empleado['celular'],
                'area' => $empleado['area'],
                'ubicacion' => $ubicacion,
                'rol' => 'empleado',
                'actualizarClave' => $empleado['actualizarClave'],
            ]);
        }

        $chofer = DB::table('choferes')->where('cedula',$request->cedula)->first();

        if ($chofer && $chofer['clave'] == $request->clave ) {
            if(isset($chofer['ubicacion'])){
                $ubicacion = $chofer['ubicacion'];
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Chofer encontrado',
                'id_usuario' => (string) $chofer['_id'],
                'nombre' => $chofer['nombre'],
                'apellido' => $chofer['apellido'],
                'cedula' => $chofer['cedula'],
                'celular' => $chofer['celular'],
                'ubicacion' => $ubicacion,
                'rol' => 'chofer',
                'actualizarClave' => $chofer['actualizarClave'],

            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Usuario o Clave Incorrectos',
            ], 401);
        
    }
    
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actualizarPwd(Request $request)
    {
        if($request->rol == 'empleado'){
            $empleado = DB::table('empleados')->where('_id',$request->id_usuario)->update(['clave' => $request->newPwd, 'actualizarClave' => false]); 
            return response()->json([
                'status' => 'success',
                'message' => 'Contraseña actualizada exitosamente'
            ]);
        }
        elseif($request->rol == 'chofer'){
            $chofer = DB::table('choferes')->where('_id',$request->id_usuario)->update(['clave' => $request->newPwd, 'actualizarClave' => false]);
            return response()->json([
                'status' => 'success',
                'message' => 'Contraseña actualizada exitosamente'
            ]);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Usuario no encontrado',
                ], 400);
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getHorario(Request $request)
    {
        $horarios = DB::table('horarios')->where('area',$request->area)->get();
        $horarioActual = new Horario();
        foreach ($horarios as $horario){
            $arrayFecha= explode(' - ', $horario['fecha']);
            $arrayFechaInicio= explode('/', $arrayFecha[0]);
            $fechaInicio= mktime(0,0,0,$arrayFechaInicio[1],$arrayFechaInicio[0],$arrayFechaInicio[2]);
            $arrayFechaFin= explode('/', $arrayFecha[1]);
            $fechaFin= mktime(0,0,0,$arrayFechaFin[1],$arrayFechaFin[0],$arrayFechaFin[2]);
            $fechaActual = strtotime(date('d-m-Y'));
            
            if($fechaInicio <= $fechaActual && $fechaFin >= $fechaActual){
                $horarioActual=$horario;
                break;
            } 
        }

        $turnoActual;
        foreach ($horarioActual['turno_semanal'] as $turno) {
            if((string) $turno['empleado'] == $request->id_usuario){
                $turnoActual = $turno;
                break;
            }

        }
        if ($turnoActual){
            $diasArray = ['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];
            foreach($diasArray as $dia){
                if($turnoActual[$dia] == 'M'){
                    $turnoActual[$dia] = 'Mañana';
                } elseif($turnoActual[$dia] == 'N'){
                    $turnoActual[$dia] = 'Noche';
                } else{
                    $turnoActual[$dia] = 'Libre';
                }
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Horario semanal encontrado',
                'lunes' => $turnoActual['lunes'],
                'martes' => $turnoActual['martes'],
                'miercoles' => $turnoActual['miercoles'],
                'jueves' => $turnoActual['jueves'],
                'viernes' => $turnoActual['viernes'],
                'sabado' => $turnoActual['sabado'],
                'domingo' => $turnoActual['domingo'],
                ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Horario no encontrado',
            ], 400);
    }

        /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function listaRecorrido(Request $request)
    {
        $asigRutas = DB::table('asig_rutas')->get(); 
        
        $asigRutaActual = new AsignacionRuta();
        foreach ($asigRutas as $ar){
            foreach ($ar['id_empleado'] as $emp) {
                if((string) $emp == $request->id_usuario){
                    $asigRutaActual = $ar;
                    break;
                }
            }
        }
        $empIdArray =[];
        foreach ($asigRutaActual['id_empleado'] as $emp1) {
            array_push($empIdArray, (string) $emp1);

        }    
        $empleados = DB::table('empleados')->whereIn('_id',$empIdArray)->get();
        
        $ruta = DB::table('rutas')->where('_id',(string) $asigRutaActual['id_ruta'])->first();
        
        $horarios = DB::table('horarios')->get();
        $horarioArray = [];
        foreach ($horarios as $horario){
            $arrayFecha= explode(' - ', $horario['fecha']);
            $arrayFechaInicio= explode('/', $arrayFecha[0]);
            $fechaInicio= mktime(0,0,0,$arrayFechaInicio[1],$arrayFechaInicio[0],$arrayFechaInicio[2]);
            $arrayFechaFin= explode('/', $arrayFecha[1]);
            $fechaFin= mktime(0,0,0,$arrayFechaFin[1],$arrayFechaFin[0],$arrayFechaFin[2]);
            $fechaActual = strtotime(date('d-m-Y'));
            
            if($fechaInicio <= $fechaActual && $fechaFin >= $fechaActual){
                array_push($horarioArray, $horario);
            }
        }
        $empleadosTurnoArray = [];
        foreach($horarioArray as $hor){
            foreach($hor['turno_semanal'] as $turno){
                if($turno[$request->dia] == $request->turno ){
                    array_push($empleadosTurnoArray, (string) $turno['empleado']);
                }
            }
        }
        
        $nombreEmpleadosArray=[];
        foreach($empleados as $empleado){
            if(in_array ($empleado['_id'], $empleadosTurnoArray)){
            array_push($nombreEmpleadosArray, $empleado['nombre'].' '.$empleado['apellido']);
            }
        }
        $chofer = DB::table('choferes')->where('_id', $ruta['chofer'])->first();
        if($chofer && $ruta){
            return response()->json([
                'status' => 'success',
                'message' => 'Datos de ruta encontrados',
                'lista_empleados' => $nombreEmpleadosArray,
                'nombre_ruta' => $ruta['nombre'],
                'nombre_chofer' => $chofer['nombre'].' '.$chofer['apellido']
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Datos de ruta no encontrados',
            ], 400);
    }

/**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ubicacionCasa(Request $request)
    {
        $ubicacion = [
            'latitud'=> $request->latitud,
            'longitud'=> $request->longitud
        ];
        if($request->rol == 'empleado'){
            $empleado = DB::table('empleados')->where('_id',$request->id_usuario)->update(['ubicacion' => $ubicacion]); 
            return response()->json([
                'status' => 'success',
                'message' => 'Ubicación guardada exitosamente'
            ]);
        }
        elseif($request->rol == 'chofer'){
            $chofer = DB::table('choferes')->where('_id',$request->id_usuario)->update(['ubicacion' => $ubicacion]);
            return response()->json([
                'status' => 'success',
                'message' => 'Ubicación guardada exitosamente'
            ]);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Usuario no encontrado',
                ], 400);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function olvidoClave(Request $request)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
        $clave = substr(str_shuffle($caracteres), 0, 6);
        
        $empleado = DB::table('empleados')->where('cedula',$request->cedula)->first();
        if ($empleado && $empleado['cedula'] == $request->cedula) {
            DB::table('empleados')->where('cedula',$request->cedula)->update(['clave' => $clave, 'actualizarClave' => true]); 
            //envio de clave por correo
            return response()->json([
                'status' => 'success',
                'message' => 'Email de usuario encontrado',
                'email' => $empleado['correo'],
                'clave' => $clave
            ]);
        }

        $chofer = DB::table('choferes')->where('cedula',$request->cedula)->first();
        if ($chofer && $chofer['cedula'] == $request->cedula) {
            DB::table('choferes')->where('cedula',$request->cedula)->update(['clave' => $clave, 'actualizarClave' => true]); 
            return response()->json([
                'status' => 'success',
                'message' => 'Email de usuario encontrado',
                'email' => $chofer['correo']
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Usuario no encontrado',
            ], 400);
    }

}
