<?php

namespace Database\Factories;

use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Contacto;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatriculaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matricula::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $contacto = Contacto::all()->random();
        $alumno_existe = Alumno::where('contacto_id', '=', $contacto->id)->get();

        if (!count($alumno_existe)){//entra si el alumno no existe
    
            //crear el usuario y asignarlo al request
            $user = User::create([
                'name' => $contacto->nombres . ' ' . $contacto->apellidos,
                'email' => $contacto->email,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'estado' => 1,
            ]);

            //obtener el ultimo codigo de alumno y asignar el nuevo
            //AlumnoObserver / creating

            //crear el alumno 
            $alumno = Alumno::create([
                'estado' => 0,
                'contacto_id' => $contacto->id,
                'user_id' => $user->id,
            ]);

        } else {
            $alumno = $contacto->alumno;
        }


        return [
            'alumno_id' => $alumno->id,
            'grupo_id' => Grupo::all()->random()->id,
            'empleado_id' => Empleado::all()->random()->id,
            'estado' => 0,
            'tipomatricula' => $this->faker->numberBetween($min = 0, $max = 1),
            'fecha' => $this->faker->dateTimeThisYear($max = '2021-12-31', $timezone = null)->format('Y-m-d')
        ];
    }
}
