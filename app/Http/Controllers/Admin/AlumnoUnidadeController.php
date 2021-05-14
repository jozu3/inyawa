<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno_unidade;
use Illuminate\Http\Request;

class AlumnoUnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $grupo = Grupo::find($request->grupo_id);
        $matriculas = $grupo->matriculas;

        foreach ($matriculas as $matricula){
            foreach ($grupo->unidads as $unidad){
                $alumno_unidade = Alumno_unidade::create([
                    'unidad_id' => $unidad->id,
                    'matricula_id' => $matricula->id,
                ]);

                foreach($alumno_unidade->unidad->notas as $nota){
                    Alumno_nota::create([
                        'nota_id' => $nota->id,
                        'alumno_unidade_id' => $alumno_unidade->id,
                    ])
                }
            }
        }

        return redirect()->route('admin.grupos.edit', compact('grupo'))->with('info_alumno_nota', 'Los registros de notas para los alumnos se generaron correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno_unidade  $alumno_unidade
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno_unidade $alumno_unidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno_unidade  $alumno_unidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno_unidade $alumno_unidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno_unidade  $alumno_unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno_unidade $alumno_unidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno_unidade  $alumno_unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno_unidade $alumno_unidade)
    {
        //
    }
}
