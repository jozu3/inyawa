<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatriculaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Alumno;
use App\Models\Contacto;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Matricula;
use App\Models\Obligacione;
use DB;

class MatriculaController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.matriculas.index')->only('index');
        $this->middleware('can:admin.matriculas.create')->only('create', 'store');
        $this->middleware('can:admin.matriculas.edit')->only('edit', 'update');
        $this->middleware('can:admin.matriculas.destroy')->only('destroy');
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
        $this->authorize('vendiendo', $contacto);
        $alumno_existe = null;
        if (isset($contacto->alumno)) {
            $alumno_existe = 'Ya es alumno, se sugiere tipo de matrícula para alumno antiguo.';
        }

        $vendedores = [];
        if (auth()->user()->hasRole(['Admin', 'Asistente'])) {
            $vendedores = Empleado::select(DB::raw('concat(nombres, " ", apellidos) as nombre'), 'id')->pluck('nombre', 'id');
            //$contacto['vendedor_id'] = $contacto->empleado_id;
        }

        return view('admin.matriculas.create', compact('contacto', 'alumno_existe', 'vendedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatriculaRequest $request)
    {

        //actualizar daotos del contacto
        $contacto = Contacto::find($request->contacto_id);
        //$this->authorize('updating', $contacto);// no se que hacia esto aquí
        $request['estado'] = 5;

        /*if (isset($request['vendedor_id'])) {
            //para actualizar el vendedor del contacto si fuera necesario
            $request['empleado_id'] = $request['vendedor_id'];
        }*/

        $alumno_existe = Alumno::where('contacto_id', '=', $request->contacto_id)->get();


        if (!count($alumno_existe)){//entra si el alumno no existe

            $usuario_existe = User::where('email', $request->email)->get();

            if (count($usuario_existe)>0){
                return redirect()->back()->with('error', 'El correo electrónico ya está asociado a otro usuario, debe ingresar uno diferente.');
            }

            $contacto->update($request->all());
            $contacto = Contacto::find($request->contacto_id);

            
            //crear el usuario y asignarlo al request
            $user = User::create([
                'name' => $contacto->nombres . ' ' . $contacto->apellidos,
                'email' => $contacto->email,
                'password' => Hash::make('password'),
                'estado' => 1,
            ])->assignRole('Alumno');

            $request['user_id'] = $user->id;

            //obtener el ultimo codigo de alumno y asignar el nuevo
            //AlumnoObserver / creating
            //crear el alumno 
            $alumno = Alumno::create($request->all());

        } else {
            $matricula_existe = Matricula::where('alumno_id', $contacto->alumno->id)->where('grupo_id', $request->grupo_id)->get();
            
            if (!count($matricula_existe)){ //Entra si no hay matricula en el mismo grupo
                $contacto->update($request->all());

                $alumno = $contacto->alumno;
            } else {
                 return redirect()->back()->with('error', 'El alumno ya está matriculado en el grupo seleccionado.');
            }
        }

        $request['alumno_id'] = $alumno->id;

        //estado de la matricula
        $request['estado'] = '0';

        //registrar la matrícula
        $matricula = Matricula::create($request->all());

        //generar las obligaciones por pagar MatriculaObserver
        
        return redirect()->route('admin.matriculas.show', $matricula)->with('info', 'Matrícula registrada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        return view('admin.matriculas.show', compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        $matricula['curso_id'] = $matricula->grupo->curso->id;
        return view('admin.matriculas.edit', compact('matricula'));
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
        $matricula->update([
            'tipomatricula' => $request->tipomatricula,
            'estado' => $request->estado
            //'grupo_id' => $request->grupo_id
        ]);
        
        return redirect()->route('admin.matriculas.edit', compact('matricula'))->with('info','Se actualizaron los datos correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return redirect()->route('admin.matriculas.index')->with('eliminar','Ok');
    }
}
