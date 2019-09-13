<?php

namespace App\Http\Controllers;

use App\MedicosAsignados;
use App\Medicos;
use App\Especialidades;
use Illuminate\Http\Request;

class MedicosAsignadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masignados = MedicosAsignados::all();
        $especialidades = Especialidades::all();
        $doctor = Medicos::all();
        return view('especial.asignados', compact('masignados','especialidades','doctor'));
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
        $masignadosAgregar = new MedicosAsignados;
        $request->validate([
            'medico' => 'required',
            'especialidad' => 'required',
            
        ]);
        $masignadosAgregar->id_medico = $request->medico;
        $masignadosAgregar->id_especialidad = $request->especialidad;
        
        $masignadosAgregar->save();
        return back()->with('agregarmasignado' , 'El medico fue asignado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(MedicosAsignados $medicosAsignados)
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masignadoEliminar = MedicosAsignados::findOrFail($id);
        $masignadoEliminar->delete();
        return back()->with('eliminarmasignado' , 'El medico fue sacado de la especialidad');
    }
}

