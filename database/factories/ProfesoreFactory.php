<?php

namespace Database\Factories;

use App\Models\Profesore;
use App\Models\User;
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
        //$users = User::where()
        return [
        /*    'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'telefono' => $this->faker->phoneNumber(),
            'user_id' => $this->faker->unique()->numberBetween($min = 3, $max = 12),*/
        ];
    }
}
