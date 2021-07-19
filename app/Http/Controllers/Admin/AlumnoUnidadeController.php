<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno_unidade;
use App\Models\Alumno_nota;
use App\Models\Grupo;
use Illuminate\Http\Request;

class AlumnoUnidadeController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.alumno_unidades.index')->only('index');
        $this->middleware('can:admin.alumno_unidades.create')->only('create', 'store');
        $this->middleware('can:admin.alumno_unidades.edit')->only('edit', 'update');
        $this->middleware('can:admin.alumno_unidades.destroy')->only('destroy', 'destroyfromgroup');
    }
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
                    ]);
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
     * @param  \Illuminate\Http\Request    }
     * @param  \App\Models\Alumno_unidade  $alumno_unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno_unidade $alumno_unidade)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno_unidade  $alumno_unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno_unidade $alumno_unidade)
    {

    }

    public function destroyfromgroup(Grupo $grupo){
        $result = false;
       //dd($grupo);
        foreach ($grupo->matriculas as $matricula){
            foreach ($matricula->alumnoUnidades as $alumnoUnidad){
                $result = false;
                if ($alumnoUnidad->delete()) {
                    $result = true;
                }
            }
        }
        if ($result){
            $var_msg = 'info_alumno_nota';
            $msg = 'Los registros de notas para los alumnos se eliminaron correctamente.';
        } else {
            $var_msg = 'error_alumno_nota';
            $msg = 'No se pudo eliminar todos los registros correctamente.';
        }

        return redirect()->route('admin.grupos.edit', compact('grupo'))->with($var_msg, $msg);

    }
    
    public function updatefromgroup(Request $request, Grupo $grupo){

        $grupo = Grupo::find($request->grupo_id);
        $matriculas = $grupo->matriculas;

        foreach ($matriculas as $matricula){
            $existe = Alumno_unidade::where('matricula_id',$matricula->id)->count();

            foreach ($grupo->unidads as $unidad){

                if (!$existe) {
                    $alumno_unidade = Alumno_unidade::create([
                        'unidad_id' => $unidad->id,
                        'matricula_id' => $matricula->id,
                    ]);

                    foreach($alumno_unidade->unidad->notas as $nota){
                        Alumno_nota::create([
                            'nota_id' => $nota->id,
                            'alumno_unidade_id' => $alumno_unidade->id,
                        ]);
                    }
                }
                
            }
        }

        return redirect()->route('admin.grupos.edit', compact('grupo'))->with('info_alumno_nota', 'Los registros de notas para los alumnos se generaron correctamente.');
    }
}
