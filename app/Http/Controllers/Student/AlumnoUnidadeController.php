<?php

namespace App\Http\Controllers\Student;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno_unidade  $alumno_unidade
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno_unidade $alumno_unidade)
    {
        return view('st.alumno_unidade.show');
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
