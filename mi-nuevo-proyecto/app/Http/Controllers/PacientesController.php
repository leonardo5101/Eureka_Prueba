<?php

namespace App\Http\Controllers;

use App\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacient = Pacientes::all();
        return view('pac.pacientes', compact('pacient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pacienteAgregar = new Pacientes;
        $request->validate([
            'nombre' => 'required',
            'peso' => 'required',
            'talla' => 'required',
            'documento' => 'required',
        ]);
        $pacienteAgregar->nombre = $request->nombre;
        $pacienteAgregar->peso = $request->peso;
        $pacienteAgregar->talla = $request->talla;
        $pacienteAgregar->edad = $request->edad;
        $pacienteAgregar->documento = $request->documento;
        $pacienteAgregar->telefono = $request->telefono;
        $pacienteAgregar->save();
        return back()->with('agregarpaciente' , 'El paciente agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacienteActualizar = Pacientes::findOrFail($id);
        return view('pac.editPaciente' , compact('pacienteActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pacienteUpdate = Pacientes::findOrFail($id);
        $pacienteUpdate->nombre = $request->nombre;
        $pacienteUpdate->peso = $request->peso;
        $pacienteUpdate->talla = $request->talla;
        $pacienteUpdate->edad = $request->edad;
        $pacienteUpdate->documento = $request->documento;
        $pacienteUpdate->telefono = $request->telefono;
        $pacienteUpdate->save();
        return back()->with('updatepaciente' , 'El Paciente ha sido actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacienteEliminar = Pacientes::findOrFail($id);
        $pacienteEliminar->delete();
        return back()->with('eliminarpaciente' , 'La nota ha sido eliminada correctamente');
    }
}
