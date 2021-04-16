<?php

namespace Database\Factories;

use App\Models\Seguimiento;
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
        return [
            'fecha' => $this->faker->dateTimeThisMonth()->format('Y-m-d'),
            'contacto_id' => $this->faker->numberBetween($min = 1, $max = 50),
            'curso_id' => $this->faker->numberBetween($min = 1, $max = 15),
            'tipo' => 0,
            'comentario' => $this->faker->word(8),
            'empleado_id' => $this->faker->numberBetween($min = 1, $max = 2),
        ];
    }
}
