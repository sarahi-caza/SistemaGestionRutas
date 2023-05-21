<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //$empleados = DB::table('empleados')->where('area','MET')->get();

        return view('horarios.select_area');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $area
     * @return \Illuminate\Http\Response
     */
    public function selectArea($area): View
    {
        $empleados = DB::table('empleados')->where('area',$area)->get();
        
        return view('horarios.nuevo_horario', ['empleados' => $empleados, 'area'=> $area]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleados = DB::table('empleados')->where('area', $request->input('horario'))->get();
        $fecha = $request->input('fecha');

        $empArray = [];
        foreach($empleados as $emp){
            $turnoSemanal = (object) [
                'empleado' => $emp['_id'],
                'lunes' => $request->input('lu-'.$emp['_id']),
                'martes' => $request->input('ma-'.$emp['_id']),
                'miercoles' => $request->input('mi-'.$emp['_id']),
                'jueves' => $request->input('ju-'.$emp['_id']),
                'viernes' => $request->input('vi-'.$emp['_id']),
                'sabado' => $request->input('sa-'.$emp['_id']),
                'domingo' => $request->input('do-'.$emp['_id']),
            ];
            array_push($empArray, $turnoSemanal);
        }
        
        $horario = Horario::create(
            [
                'fecha' => $fecha,
                'turno_semanal' => $empArray
            ]
        );

        return redirect()->route('horarios.select_area')
            ->with('success', 'Horario creado con éxito.');
    }

}