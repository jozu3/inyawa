<?php

namespace Database\Factories;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empleado::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", ["Vendedor"]); })->pluck('id');

        return [
            'nombres' => $this->faker->firstName().' '.$this->faker->firstName(),
            'apellidos' => $this->faker->lastName().' '.$this->faker->lastName(),
            'telefono' => $this->faker->phoneNumber(),
            'user_id' => $this->faker->unique()->randomElement($users)
        ];
    }
}
