<?php

namespace Database\Factories;

use App\Models\Contacto;
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
        $nombres = $this->faker->word(8);

        return [
            'nombres' => $nombres,
            'apellidos' => $this->faker->word(8),
            'email' => $this->faker->unique()->safeEmail,
            'empleado_id' => $this->faker->numberBetween($min = 1, $max = 2)
        ];
    }
}
