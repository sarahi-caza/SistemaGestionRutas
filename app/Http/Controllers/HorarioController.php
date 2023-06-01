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
        return view('horarios.select_area');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function historialHorarios(): View
    {
        $horarios = Horario::paginate();

        return view('horarios\historial', compact('horarios'))
            ->with('i', (request()->input('page', 1) - 1) * $horarios->perPage());
    
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
        $area = $request->input('horario');
        $empleados = DB::table('empleados')->where('area', $area)->get();
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
                'turno_semanal' => $empArray,
                'area' => $area
            ]
        );

        return redirect()->route('horarios.select_area')
            ->with('success', 'Horario creado con éxito.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        $empleadosArray = [];
        foreach ($horario->turno_semanal  as $turno) {
            $empleado = DB::table('empleados')->where ('_id', $turno['empleado'])->first();
            $empleadosArray +=[''.$turno['empleado']=> $empleado['nombre'].'  '.$empleado['apellido']];
        }

        return view('horarios\show', ['horario' => $horario, 'empleadosArray' => $empleadosArray]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horario = Horario::find($id);
        $empleadosArray = [];
        foreach ($horario->turno_semanal  as $turno) {
            $empleado = DB::table('empleados')->where ('_id', $turno['empleado'])->first();
            $empleadosArray +=[''.$turno['empleado']=> $empleado['nombre'].'  '.$empleado['apellido']];
        }
        return view('horarios\edit', ['horario' => $horario, 'empleadosArray' => $empleadosArray]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Horario $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
    //    request()->validate(Horario::$rules);

        $area = $request->input('horario');
        $empleados = DB::table('empleados')->where('area', $area)->get();
        //$fecha = $request->input('fecha');
        
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
        
        
        //$horario1 = Horario::where('id', $horario->_id)->first();
        $horario->update([
            'turno_semanal' => $empArray,
        ]);

        return redirect()->route('horarios.historial')
            ->with('success', 'Horario editado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $horario = Horario::find($id)->delete();

        return redirect()->route('horarios.historial')
            ->with('success', 'Horario eliminado con éxito');
    }
}