<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatriculaRequest;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Contacto;
use App\Models\Matricula;

class MatriculaController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.matriculas.index');//->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.matriculas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto = Contacto::find($_GET['idcontacto']);

        return view('admin.matriculas.create', compact('contacto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatriculaRequest $request)
    {
        Contacto::find($request->contacto_id)->update($request->all());

        $ultimo = Alumno::orderBy('created_at', 'desc')->first();
        $newcodigo = 0;

        if (!isset($ultimo->codigo) || $ultimo->codigo == 0 || $ultimo->codigo == null){
            $request['codigo'] = 1000;
        } else {
            $newcodigo = $ultimo->codigo;
            $newcodigo++;
            $request['codigo'] = $newcodigo;
        }

        $alumno = Alumno::create($request->all());
        $request['alumno_id'] = $alumno->id;
        $request['estado'] = '0';
        Matricula::create($request->all());

        return redirect()->route('admin.matriculas.index')->with('info', 'Matrícula registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //
    }

    private function codigoalumno(){
        //return $codigo;
    }
}
