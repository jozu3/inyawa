<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Obligacione;

class ObligacioneController extends Controller
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
     * @param  int  Obligacione $obligacione
     * @return \Illuminate\Http\Response
     */
    public function show(Obligacione $obligacione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Obligacione $obligacione
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
     * @param  int  Obligacione $obligacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obligacione $obligacione)
    {
        $obligacione->update([
            'fecha' => $request->fechalimite,
            'descuento' => $request->descuento,
            'montofinal' => $obligacione->monto - $request->descuento,
        ]);

        $matricula = $obligacione->matricula;

        return redirect()->route('admin.matriculas.edit', compact('matricula'))->with('obl-actualizada', 'Se guardó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Obligacione $obligacione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obligacione $obligacione)
    {
        //
    }
}
