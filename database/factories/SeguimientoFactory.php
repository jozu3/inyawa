<?php

namespace Database\Factories;

use App\Models\Seguimiento;
use App\Models\Contacto;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeguimientoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seguimiento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $contactos = Contacto::all();
        $ids_contactos = [];

        foreach ($contactos as $contacto){
            array_push($ids_contactos, $contacto->id);
        }

        $cursos = Curso::all();
        $ids_cursos = [];

        foreach ($cursos as $curso){
            array_push($ids_cursos, $curso->id);
        }


        return [
            'fecha' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null)->format('Y-m-d'),
            'contacto_id' => $this->faker->randomElement($ids_contactos),
            'curso_id' => $this->faker->randomElement($ids_cursos),
            'tipo' => 0,
            'comentario' => $this->faker->sentence(),
            'empleado_id' => $this->faker->numberBetween($min = 1, $max = 2),
        ];
    }
}
