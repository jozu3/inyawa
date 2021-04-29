<?php

namespace Database\Factories;

use App\Models\Grupo;
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
        return [
            'curso_id' => $this->faker->numberBetween($min = 1, $max = 15),
            'matricula' => $this->faker->numberBetween($min = 200, $max = 1000),
            'matricula2' => $this->faker->numberBetween($min = 200, $max = 1000),
            'ncuotas' => $this->faker->numberBetween($min = 1, $max = 10),
            'cuota' => $this->faker->numberBetween($min = 200, $max = 1000),
            'cuota2' => $this->faker->numberBetween($min = 200, $max = 1000),
            'certificacion' => $this->faker->numberBetween($min = 200, $max = 1000),
            'certificacion2' => $this->faker->numberBetween($min = 200, $max = 1000),
            'fecha' => $this->faker->date(),
            'estado' => $this->faker->numberBetween($min = 0, $max = 2),
        ];
    }
}