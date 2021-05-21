<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Contacto;
use App\Models\Seguimiento;
use App\Models\Empleado;
use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactoRequest;

class ContactoController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.contactos.index');//->only('index');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contactos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('crear', Contacto::class);

        return view('admin.contactos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactoRequest $request)
    {
        $request['estado'] = 1;
        $contacto = Contacto::create($request->all());

        return redirect()->route('admin.contactos.show', compact('contacto'))->with('info', 'Contacto creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //dd($contacto->id);
        $this->authorize('vendiendo', $contacto);

        $seguimientos = Seguimiento::where('contacto_id', $contacto->id)->get();
        $cursos = Curso::pluck('nombre', 'id');

        return view('admin.contactos.show', compact('contacto','seguimientos', 'cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        $this->authorize('vendiendo', $contacto);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContactoRequest $request, Contacto $contacto)
    {
        $this->authorize('vendiendo', $contacto);

        if (!$contacto->update($request->all())) {
            return redirect()->route('admin.contactos.show', compact('contacto'))->with('error', 'Hubo un error al actualizar');
        }

        if ($request->asignar == 'true'){
            
            return redirect()->route('admin.contactos.index')->with('info', 'Contacto actualizado con éxito');
        }

        if ($request->updt_alumno == 'true'){
            $alumno = $contacto->alumno;
            return redirect()->route('admin.alumnos.edit', compact('alumno') )->with('info', 'Contacto actualizado con éxito');
        }        
        

        return redirect()->route('admin.contactos.show', compact('contacto'))->with('info', 'Contacto actualizado con éxito');
    }


/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        $this->authorize('vendiendo', $contacto);
        
        $contacto->delete();

        return redirect()->route('admin.contactos.index')->with('info', 'Contacto eliminado con éxito');
    }
}
