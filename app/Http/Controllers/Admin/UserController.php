<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use App\Models\Empleado;

use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function __construct(){
        $this->middleware('can:admin.users.index');//->only('index');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $empleado = $_GET['empleado'];
        
        return view('admin.users.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => $this->passwordRules(),
        ]);

        $name = '';



        try {
            if (isset($request->empleado_id)) {
                
                $empleado_id = $request->empleado_id;
                $empleado = Empleado::where('id', $empleado_id)->first();            
                $name = $empleado->nombres.' '.$empleado->apellidos;
            
            }

            $user = User::create([
                    'name' => $name,
                    'email' => $_POST['email'],
                    'password' => Hash::make($_POST['password']),
                ]);
            

            if (isset($request->empleado_id) && $user) {
                
                if ($empleado->update(['user_id' => $user->id])) {
                    return redirect()->route('admin.users.index')->with('info', 'El usuario se creó correctamente');
                }
            }


        } catch (\PDOException $e) {
            return view('admin.users.create', [
                'empleado' => $empleado_id,
                'error' => $e->getMessage()
            ]);
        }
        
        return view('admin.users.create', ['empleado' => $empleado_id]);

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
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->update($request->all());

        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asigno los roles correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
