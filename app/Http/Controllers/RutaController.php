<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
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
        $choferes = DB::table('choferes')->get();
        return view('rutas\index', ['rutas' => $rutas, 'choferes' => $choferes])
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
        return view('rutas\edit', ['ruta' => $ruta, 'choferes' => $choferes]);
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
            ->with('success', 'Ruta editadacon éxito');
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
}