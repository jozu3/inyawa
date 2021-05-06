<?php

namespace Database\Factories;

use App\Models\Grupo;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grupo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cursos = Curso::all();
        $ids_cursos = [];

        foreach ($cursos as $curso){
            array_push($ids_cursos, $curso->id);
        }

        $fecha = $this->faker->dateTimeThisYear($max = '2021-12-31', $timezone = null)->format('Y-m-d');

        $estado = 1;
        if($fecha > date("Y-m-d")){
            $estado = 0;
        }

        return [
            'curso_id' => $this->faker->randomElement($ids_cursos),
            'matricula' => $this->faker->numberBetween($min = 100, $max = 1000),
            'matricula2' => $this->faker->numberBetween($min = 100, $max = 1000),
            'ncuotas' => $this->faker->numberBetween($min = 1, $max = 10),
            'cuota' => $this->faker->numberBetween($min = 100, $max = 1000),
            'cuota2' => $this->faker->numberBetween($min = 100, $max = 1000),
            'certificacion' => $this->faker->numberBetween($min = 100, $max = 1000),
            'certificacion2' => $this->faker->numberBetween($min = 100, $max = 1000),
            'fecha' => $fecha,
            'estado' => $estado,
        ];
    }
}