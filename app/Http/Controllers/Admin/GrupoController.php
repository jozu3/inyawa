<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Grupo;

class GrupoController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.grupos.index')->only('index');
        $this->middleware('can:admin.asistencias.create')->only('show');
        $this->middleware('can:admin.alumno_notas.create')->only('show');
        $this->middleware('can:admin.grupos.create')->only('create', 'store');
        $this->middleware('can:admin.grupos.edit')->only('edit', 'update');
        $this->middleware('can:admin.grupos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::all();
        
        return view('admin.grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
    
        $curso = Curso::find($_GET['idcurso']);

        return view('admin.grupos.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'curso_id' => 'required',
            'matricula' => ['required', 'numeric'],
            'matricula2' => ['required', 'numeric'],
            'ncuotas' => ['required', 'numeric'],
            'cuota' => ['required', 'numeric'],
            'cuota2' => ['required', 'numeric'],
            'certificacion' => ['required', 'numeric'],
            'certificacion2' => ['required', 'numeric'],
            'fecha' => ['required', 'date'],
            'estado' => ['required', 'numeric'],
        ]);

        $grupo = Grupo::create($request->all());

        $curso = Curso::find($request->curso_id);
        echo $request->id;  

        return redirect()->route('admin.cursos.edit', compact('curso'))->with('info', 'Grupo creado con ??xito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        return view('admin.grupos.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        $curso = $grupo->curso;
        return view('admin.grupos.edit', compact('grupo', 'curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        $request->validate([
            'curso_id' => 'required',
            'matricula' => ['required', 'numeric'],
            'matricula2' => ['required', 'numeric'],
            'ncuotas' => ['required', 'numeric'],
            'cuota' => ['required', 'numeric'],
            'cuota2' => ['required', 'numeric'],
            'certificacion' => ['required', 'numeric'],
            'certificacion2' => ['required', 'numeric'],
            'fecha' => ['required', 'date'],
            'estado' => ['required', 'numeric'],
        ]);

        $grupo->update($request->all());

        return redirect()->route('admin.grupos.edit', compact('grupo'))->with('info', 'Se actualizaron los datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->route('admin.cursos.edit', $grupo->curso)->with('info', 'El grupo se elimin?? con ??xito'); 
    }
}
