<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidencias = Incidencia::all();
        return view('incidencias.index', compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incidencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incidencia = new Incidencia();
        $incidencia->user_id=Auth::id();
        $incidencia->clase=$request->clase;
        $incidencia->equipo=$request->equipo;
        $incidencia->cAveria=$request->cAveria;
        $incidencia->cAveriaInfo=$request->cAveriaInfo;
        $incidencia->estado='recibido';
        $incidencia->save();
        return redirect()->route('incidencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $incidencia)
    {
        return view('incidencias.show', compact('incidencia'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $incidencia)
    {
        return view('incidencias.edit', compact('incidencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $incidencia = Incidencia::find($id);
        $incidencia->user_id=$incidencia->user_id;
        $incidencia->clase=$incidencia->clase;
        $incidencia->equipo=$incidencia->equipo;
        $incidencia->cAveria=$incidencia->cAveria;
        $incidencia->cAveriaInfo=$incidencia->cAveriaInfo;
        $incidencia->estado=$request->get('estado');
        $incidencia->cAdicional=$request->get('cAdicional');
        $incidencia->save();
        return redirect()->route('incidencias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $incidencia)
    {
        $incidencia->delete();
        return redirect()->route('incidencias.index');
    }
}
