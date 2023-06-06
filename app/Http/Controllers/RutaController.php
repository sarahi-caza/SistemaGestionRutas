<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use App\Models\AsignacionRuta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas = Ruta::paginate();
        foreach($rutas as $ruta){
            $chofer = DB::table('choferes')->where ('_id', $ruta->chofer)->first();
            $ruta->chofer = $chofer['nombre'].'  '.$chofer['apellido'];
        }
    
        return view('rutas\index', ['rutas' => $rutas])
            ->with('i', (request()->input('page', 1) - 1) * $rutas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta = new Ruta();
        $choferes = DB::table('choferes')->get();
        return view('rutas\create', [compact('ruta'), 'choferes' => $choferes]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   request()->validate(Ruta::$rules);

        $ruta = Ruta::create($request->all());

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruta = Ruta::find($id);
        $choferes = DB::table('choferes')->get();
        $asignaRutas = DB::table('asig_rutas')->get();
        $asignaRuta = new AsignacionRuta();
        foreach($asignaRutas as $ar ){
            if($ar['id_ruta'] == $id){
                $asignaRuta=$ar;
                break;
            }
        }
        $listaEmpleados=[];
        foreach($asignaRuta['id_empleado'] as $emp){
            $empleado = DB::table('empleados')->where('_id', $emp)->first();
            array_push($listaEmpleados, $empleado['nombre'].' '.$empleado['apellido']); 
        }        
        
        return view('rutas\show', ['ruta' => $ruta, 'choferes' => $choferes, 'listaEmpleados' => $listaEmpleados]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruta = Ruta::find($id);
        $choferes = DB::table('choferes')->get();
        return view('rutas\edit', ['ruta' => $ruta, 'choferes' => $choferes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ruta $ruta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruta $ruta)
    {
    //    request()->validate(Ruta::$rules);

        $ruta->update($request->all());

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta editada con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ruta = Ruta::find($id)->delete();

        return redirect()->route('rutas.index')
            ->with('success', 'Ruta eliminada con éxito');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function asignarRuta()
    {
        $rutas = DB::table('rutas')->get();
        $empleados = DB::table('empleados')->get();
        
        return view('rutas\asignarRuta', ['rutas' => $rutas, 'empleados' => $empleados]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAsignarRuta(Request $request)
    {
        $rutas = DB::table('rutas')->get();
        $empleados = DB::table('empleados')->get();
        $asigRutasArray = [];
        foreach($rutas as $ruta){
            $asignacionRutas = DB::table('asig_rutas')->where('id_ruta', $ruta['_id'])->get();
            if(count($asignacionRutas) == 0){
                $asigRuta = AsignacionRuta::create([
                    'id_ruta' => $ruta['_id'],
                    'id_empleado' => [],
                ]);
            }
            $asigRutasArray[''.$ruta['_id']] = [];
            foreach($empleados as $emp){
                $input = $request->input('asig-'.$emp['_id']);
                if($ruta['_id'] == $input){
                    array_push($asigRutasArray[''.$ruta['_id']], $emp['_id']);
                }
            }
            $asignacionRuta = DB::table('asig_rutas')->where('id_ruta',$ruta['_id'])->update(['id_empleado' => $asigRutasArray[''.$ruta['_id']]]);
        }
    
        return redirect()->route('rutas.index')
            ->with('success', 'Asignación de Ruta exitosa.');
    }
}