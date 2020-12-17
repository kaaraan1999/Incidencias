<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIncidenciaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uincidencias = User::find(Auth::id())->indicenciasUser;
        return view('uincidencias.index', compact('uincidencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uincidencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uincidencia = new Incidencia();
        $uincidencia->user_id=Auth::id();
        $uincidencia->clase=$request->clase;
        $uincidencia->equipo=$request->equipo;
        $uincidencia->cAveria=$request->cAveria;
        $uincidencia->cAveriaInfo=$request->cAveriaInfo;
        $uincidencia->estado='recibido';
        $uincidencia->save();
        return redirect()->route('uincidencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Incidencia $uincidencia)
    {
        return view('uincidencias.show', compact('uincidencia'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Incidencia $uincidencia)
    {
        return view('uincidencias.edit', compact('uincidencia'));
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
        $incidencia->clase=$request->get('clase');
        $incidencia->equipo=$request->get('equipo');
        $incidencia->cAveria=$request->get('cAveria');
        $incidencia->cAveriaInfo=$request->get('cAveriaInfo');
        $incidencia->estado=$incidencia->estado;
        $incidencia->cAdicional=$incidencia->cAdicional;
        $incidencia->save();
        return redirect()->route('uincidencias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incidencia $uincidencia)
    {
        $uincidencia->delete();
        return redirect()->route('uincidencias.index');
    }
}
