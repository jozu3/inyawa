<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatriculaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Alumno;
use App\Models\Contacto;
use App\Models\User;
use App\Models\Matricula;
use App\Models\Obligacione;

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
        $alumno_existe = null;
        if (isset($contacto->alumno)) {
            $alumno_existe = 'Ya es alumno, se sugiere tipo de matrícula para alumno antiguo.';
        }

        return view('admin.matriculas.create', compact('contacto', 'alumno_existe'));
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
        $request['estado'] = 5;
        $contacto->update($request->all());


        $alumno_existe = Alumno::where('contacto_id', '=', $request->contacto_id)->get();

        if (!count($alumno_existe)){//entra si el alumno no existe
    
            //obtener el ultimo codigo de alumno y asignar el nuevo
            $ultimo = Alumno::orderBy('created_at', 'desc')->first();
            $newcodigo = 1000;

            if (!isset($ultimo->codigo) || $ultimo->codigo == 0 || $ultimo->codigo == null){
                $request['codigo'] = 1000;
            } else {
                $newcodigo = $ultimo->codigo;
                $newcodigo++;
                $request['codigo'] = $newcodigo;
            }

            //crear el usuario y asignarlo al request
            $user = User::create([
                'name' => $contacto->nombres . ' ' . $contacto->apellidos,
                'email' => $contacto->email,
                'password' => Hash::make('password'),
                'estado' => 1,
            ]);

            $request['user_id'] = $user->id;

            //crear el alumno 
            $alumno = Alumno::create($request->all());

        } else {
            $alumno = $contacto->alumno;
        }

        $request['alumno_id'] = $alumno->id;

        //estado de la matricula
        $request['estado'] = '0';

        //registrar la matrícula
        $matricula = Matricula::create($request->all());

        //generar las obligaciones por pagar
        $precio_matricula = $matricula->grupo->matricula;
        $precio_cuota = $matricula->grupo->cuota;
        $precio_certificacion = $matricula->grupo->certificacion;
        
        switch ($matricula->tipomatricula) {
            case 0:
                $precio_matricula = $matricula->grupo->matricula;
                $precio_cuota = $matricula->grupo->cuota;
                $precio_certificacion = $matricula->grupo->certificacion;
                break;
            case 1:
                $precio_matricula = $matricula->grupo->matricula2;
                $precio_cuota = $matricula->grupo->cuota2;
                $precio_certificacion = $matricula->grupo->certificacion2;
                break;
            default:
                $precio_matricula = 15555;
                $precio_cuota = 0;
                $precio_certificacion = 0;
                break;
        }

        //generar obligacion pago de matricula
        Obligacione::create([
            'matricula_id' => $matricula->id,
            'concepto' => 'Matricula',
            'fechalimite' => date('Y-m-d'),
            'monto' => $precio_matricula,
            'descuento' => 0,
            'montofinal' => $precio_matricula,
            'estado' => 1
        ]);

        //generar obligacion de cuotas por pagar
        for ($i = 1; $i <= $matricula->grupo->ncuotas; $i++) {
            Obligacione::create([
                'matricula_id' => $matricula->id,
                'concepto' => 'Cuota '.$i,
                'fechalimite' => date('Y-m-d'),
                'monto' => $precio_cuota,
                'descuento' => 0,
                'montofinal' => $precio_cuota,
                'estado' => 1
            ]);
        }

        //generar obligacion de certificacion
        Obligacione::create([
            'matricula_id' => $matricula->id,
            'concepto' => 'Certificación',
            'fechalimite' => date('Y-m-d'),
            'monto' => $precio_certificacion,
            'descuento' => 0,
            'montofinal' => $precio_certificacion,
            'estado' => 1
        ]);

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
