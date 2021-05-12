<?php

namespace Database\Factories;

use App\Models\Unidad;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Grupo;
use App\Models\Profesore;

class UnidadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unidad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       /* $grupos = Grupo::all();
         $ids_grupos = [];

        foreach ($grupos as $grupo){
            array_push($ids_grupos, $grupo->id);
        }

       $profesores = Profesore::all();
        $ids_profesores = [];

        foreach ($profesores as $profesore){
            array_push($ids_profesores, $profesore->id);
        }
*/
        return [
            'descripcion' => 'Unidad '.$this->faker->randomDigit(),
            'fechainicio' => $this->faker->dateTimeThisYear($max = '2021-12-31', $timezone = null)->format('Y-m-d'),
            'cantidad_clases' => $this->faker->randomDigitNot(0),
            'grupo_id' => Grupo::all()->random()->id,
            'profesore_id' => Profesore::all()->random()->id,
        ];
    }
}
