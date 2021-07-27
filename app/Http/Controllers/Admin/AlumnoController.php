<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Empleado;
use DB;

class AlumnoController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.alumnos.index');//->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
        return view('admin.alumnos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        $vendedores = [];
        if (auth()->user()->hasRole(['Admin', 'Asistente'])) {
            $vendedores = Empleado::select(DB::raw('concat(nombres, " ", apellidos) as nombre'), 'id')->pluck('nombre', 'id');
            $alumno->contacto['vendedor_id'] = $alumno->contacto->empleado_id;
        }
        return view('admin.alumnos.edit', compact('alumno', 'vendedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        
        $alumno->contacto->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'doc' => $request->doc,
            'grado_academico' => $request->grado_academico,
        ]);

        if(isset($request->empleado_id)){
            $alumno->contacto->update([
                'empleado_id' => $request->empleado_id
            ]);
        }

        return redirect()->route('admin.alumnos.edit', compact('alumno'))->with('info', 'El alumno se actualizó correctamente');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Alumno $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
