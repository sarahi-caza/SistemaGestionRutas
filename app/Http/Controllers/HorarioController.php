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
        $fecha = $request->input('fecha');
        $horario = Horario::create(
            [
                'fecha' => $fecha,
            ]
        );

        return redirect()->route('horarios.select_area')
            ->with('success', 'Horario creado con éxito.');
    }

}