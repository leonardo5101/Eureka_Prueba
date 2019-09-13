<?php

namespace App\Http\Controllers;

use App\Atencion;
use App\Especialidades;
use App\Medicos;
use App\Pacientes;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atenciones = Atencion::all();
        $especialidades = Especialidades::all();
        $doctor = Medicos::all();
        $pacientes = Pacientes::all();
        return view('atencion.atencion', compact('atenciones','especialidades','doctor','pacientes'));
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
        $atencionAgregar = new Atencion;
        $request->validate([
            'paciente' => 'required',
            'medico' => 'required',
            'especialidad' => 'required',
            'diagnostico' => 'required',
           
            
        ]);
        $atencionAgregar->id_paciente = $request->paciente;
        $atencionAgregar->id_medico = $request->medico;
        $atencionAgregar->id_especialidad = $request->especialidad;
        $atencionAgregar->diagnostico = $request->diagnostico;
        
        $atencionAgregar->save();
        return back()->with('agregaratencion' , 'La atencion fue agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
      public function show(Atencion $atencion)
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
        $atencionActualizar = Atencion::findOrFail($id);

        $especialidad = Especialidades::findOrFail($atencionActualizar->id_especialidad);
        $doctor = Medicos::findOrFail($atencionActualizar->id_medico);
        $paciente = Pacientes::findOrFail($atencionActualizar->id_paciente);
        return view('atencion.veratencion' , compact('atencionActualizar','especialidd','doctor','paciente'));
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
        $atencionUpdate = Atencion::findOrFail($id);
        $atencionUpdate->id_paciente = $request->paciente;
        $atencionUpdate->id_medico = $request->medico;
        $atencionUpdate->id_especialidad = $request->especialidad;
        $atencionUpdate->diagnostico = $request->diagnostico;
        
        $atencionUpdate->save();
        return back()->with('updateatencion' , 'La atencion ha sido actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atencionEliminar = Atencion::findOrFail($id);
        $atencionEliminar->delete();
        return back()->with('eliminaratencion' , 'La atencion ha sido eliminada correctamente');
    }
}