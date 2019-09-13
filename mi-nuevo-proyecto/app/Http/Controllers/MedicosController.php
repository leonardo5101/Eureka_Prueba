<?php

namespace App\Http\Controllers;

use App\Medicos;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Medicos::all();
        return view('doctor.doctores', compact('doctor'));
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
        $medicoAgregar = new Medicos;
        $request->validate([
            'nombre' => 'required',
            'area_principal' => 'required',
            'estado' => 'required',
        ]);
        $medicoAgregar->nombre = $request->nombre;
        $medicoAgregar->area_principal = $request->area_principal;
        $medicoAgregar->estado = $request->estado;
        $medicoAgregar->save();
        return back()->with('agregarmedico' , 'El medico fue agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Medicos $medicos)
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
        $medicoActualizar = Medicos::findOrFail($id);
        return view('doctor.editdoctores' , compact('medicoActualizar'));
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
        $medicoUpdate = Medicos::findOrFail($id);
        $medicoUpdate->nombre = $request->nombre;
        $medicoUpdate->estado = $request->estado;
        $medicoUpdate->area_principal = $request->area_principal;
        
        $medicoUpdate->save();
        return back()->with('updatemedico' , 'La informacion del medico ha sido actualizada correctamente');
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
        return back()->with('eliminarmedico' , 'La nota ha sido eliminada correctamente');
    }
}
