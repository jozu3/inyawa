<?php

namespace Database\Factories;

use App\Models\Profesore;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profesore::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->lastName(),
            'telefono' => $this->faker->phoneNumber(),
            'user_id' => $this->faker->numberBetween($min = 3, $max = 5),
        ];
    }
}
