<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Obligacione;
use App\Models\Matricula;
use Illuminate\Http\Request;

class ObligacioneController extends Controller
{
    public function __construct(){
        $this->middleware('can:student.obligaciones.index')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumno = auth()->user()->alumno;

        $matriculas = Matricula::where('alumno_id', $alumno->id)->get();

        return view('student.obligaciones.index', compact('matriculas'));
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
     * @param  \App\Models\Obligacione  $obligacione
     * @return \Illuminate\Http\Response
     */
    public function show(Obligacione $obligacione)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obligacione  $obligacione
     * @return \Illuminate\Http\Response
     */
    public function edit(Obligacione $obligacione)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obligacione  $obligacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obligacione $obligacione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obligacione  $obligacione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obligacione $obligacione)
    {
        //
    }
}
