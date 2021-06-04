<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno_nota;
use Illuminate\Http\Request;

class AlumnoNotaController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.alumno_notas.index')->only('index');
        $this->middleware('can:admin.alumno_notas.create')->only('create', 'store');
        $this->middleware('can:admin.alumno_notas.edit')->only('edit', 'update');
        $this->middleware('can:admin.alumno_notas.destroy')->only('destroy');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno_nota  $alumno_nota
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno_nota $alumno_nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno_nota  $alumno_nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno_nota $alumno_nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno_nota  $alumno_nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno_nota $alumno_nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno_nota  $alumno_nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno_nota $alumno_nota)
    {
        //
    }
}
