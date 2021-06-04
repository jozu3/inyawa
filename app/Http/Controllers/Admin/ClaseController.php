<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clase;
use App\Models\Grupo;
use App\Models\Unidad;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.clases.index')->only('index');
        $this->middleware('can:admin.clases.create')->only('create', 'store', 'storeforgroup');
        $this->middleware('can:admin.clases.edit')->only('edit', 'update');
        $this->middleware('can:admin.clases.destroy')->only('destroy', 'destroyfromgroup');
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
        $clase->update(['fechaclase' => $request->fechaclase]);
        $unidad = Unidad::find($request->unidad_id);

        return redirect()->route('admin.unidads.edit', compact('unidad'))->with('info-clase', 'La fecha de clase se editó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        //
    }

    public function storeforgroup(Grupo $grupo){

        foreach ($grupo->unidads as $unidad){
            for ($i = 0; $i < $unidad->cantidad_clases; $i++) {

                $days = 7*$i;

                Clase::create([
                    'unidad_id' => $unidad->id,
                    'fechaclase' => date('Y-m-d', strtotime( '+'.$days.'day', strtotime($unidad->fechainicio))),
                    'estado' => 0
                ]); 
            }
        }

        $var_msg = 'info_alumno_nota';
        $msg = 'Los registros de las clases para los alumnos se crearon correctamente.';

        return redirect()->route('admin.grupos.edit', compact('grupo'))->with($var_msg, $msg);
    }

    public function destroyfromgroup(Grupo $grupo){
        $result = false;
       //dd($grupo);
        foreach ($grupo->unidads as $unidad){
            foreach ($unidad->clases as $clase){
                $result = false;
                if ($clase->delete()) {
                    $result = true;
                }
            }
        }
        if ($result){
            $var_msg = 'info_alumno_nota';
            $msg = 'Los registros de las clases para los alumnos se eliminaron correctamente.';
        } else {
            $var_msg = 'error_alumno_nota';
            $msg = 'No se pudo eliminar todos los registros correctamente.';
        }

        return redirect()->route('admin.grupos.edit', compact('grupo'))->with($var_msg, $msg);

    }
}
