<?php

namespace App\Http\Controllers;

use App\Especialidades;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidades::all();
        return view('especial.especialidades', compact('especialidades'));
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
        $especialidadAgregar = new Especialidades;
        $request->validate([
            'nombre' => 'required',
            'consultorio' => 'required',
            
        ]);
        $especialidadAgregar->nombre = $request->nombre;
        $especialidadAgregar->consultorio = $request->consultorio;
        
        $especialidadAgregar->save();
        return back()->with('agregarespecialidad' , 'La especialidad agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidades $especialidad)
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
        $especialidadActualizar = Especialidades::findOrFail($id);
        return view('especial.editespecialidad' , compact('especialidadActualizar'));
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
        $especialidadUpdate = Especialidades::findOrFail($id);
        $especialidadUpdate->nombre = $request->nombre;
        $especialidadUpdate->consultorio = $request->consultorio;
        
        $especialidadUpdate->save();
        return back()->with('updateespecialidad' , 'La especialidad ha sido actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacienteEliminar = Especialidades::findOrFail($id);
        $pacienteEliminar->delete();
        return back()->with('eliminarespecialidad' , 'La especialidad ha sido eliminada correctamente');
    }
}
