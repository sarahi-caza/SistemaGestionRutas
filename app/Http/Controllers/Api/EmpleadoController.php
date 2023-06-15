<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmpleadoResource;
use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $empleado = DB::table('empleados')->where('cedula',$request->cedula)->first();
        
        if ($empleado && $empleado['clave'] == $request->clave ) {
            return response()->json([
                'status' => 'success',
                'nombre' => $empleado['nombre'],
                'apellido' => $empleado['apellido'],
                'celular' => $empleado['celular'],
                'area' => $empleado['area'],
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Usuario o Clave Incorrectos',
            ], 401);
        
        //return EmpleadoResource::collection(empleado::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(empleado $empleado)
    {
        //
    }
}
