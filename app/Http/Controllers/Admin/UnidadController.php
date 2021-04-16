<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unidad;
use App\Models\Profesore;

class UnidadController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.unidads.index');//->only('index');
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
        Unidad::create($request->all());
        //return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidad $unidad)
    {
        $profesores = Profesore::select('id', 'nombres', 'apellidos')->get();

        $profes = [];

        foreach ($profesores as $p){
            $profes[ $p['id']] = $p['nombres'] . ' ' . $p['apellidos'];
        }

        $profesores = $profes;

        return view('admin.unidads.edit', compact('unidad', 'profesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidad $unidad)
    {
         $request->validate([
            'descripcion' => 'required',
        ]);
         
        $unidad->update($request->all());

        return redirect()->route('admin.unidads.edit', compact('unidad'))->with('info', 'Se actualizaron los datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidad $unidad)
    {

        foreach ($unidad->notas as $nota){
            $nota->delete();
        }

        $unidad->delete();

        return redirect()->route('admin.grupos.edit', $unidad->grupo)->with('info', 'La unidad se eliminó con éxito'); 
    }
}
