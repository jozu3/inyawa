<?php

namespace Database\Factories;

use App\Models\Contacto;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contacto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombres = $this->faker->firstName().' '.$this->faker->firstName();

        $courso_abbr = [];
        $cursos = Curso::all();

        foreach ($cursos as $curso){
            array_push($courso_abbr, substr($curso->nombre, 0, 3).substr($curso->nombre, -1, 3));
        }
        //after (' ', 'biohazard@online.ge');
        //before ('@', 'biohazard@online.ge');
        //between ('@', '.', 'biohazard@online.ge');


        return [
            'codigo_c' => $this->faker->randomElement($courso_abbr).$this->faker->bothify('###'),
            'nombres' => $nombres,
            'apellidos' => $this->faker->lastName().' '.$this->faker->lastName(),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail,
            'doc' => $this->faker->unique()->dni,
            'estado' => $this->faker->numberBetween($min = 0, $max = 3),
            'empleado_id' => $this->faker->numberBetween($min = 3, $max = 9)
        ];
    }
}
