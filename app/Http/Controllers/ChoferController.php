<?php

namespace App\Http\Controllers;

use App\Models\Chofer;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $choferes = Chofer::paginate();

        return view('choferes\index', compact('choferes'))
            ->with('i', (request()->input('page', 1) - 1) * $choferes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chofer = new Chofer();
        return view('choferes\create', compact('chofer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   request()->validate(Chofer::$rules);
        
        $requestData = $request->all(); 
        $requestData['actualizarClave']= true;
        $chofer = Chofer::create($requestData);

        return redirect()->route('choferes.index')
            ->with('success', 'Chofer creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chofer = Chofer::find($id);

        return view('choferes\show', compact('chofer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chofer = Chofer::find($id);

        return view('choferes\edit', compact('chofer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Chofer $chofer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chofer $chofere)
    {
    //    request()->validate(Chofer::$rules);

        $chofere->update($request->all());

        return redirect()->route('choferes.index')
            ->with('success', 'Chofer editado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $chofer = Chofer::find($id)->delete();

        return redirect()->route('choferes.index')
            ->with('success', 'Chofer eliminado con éxito');
    }
}