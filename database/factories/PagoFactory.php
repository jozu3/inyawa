<?php

namespace Database\Factories;

use App\Models\Pago;
use App\Models\Obligacione;
use App\Models\Cuenta;
use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pago::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $obligacione = Obligacione::whereIn('estado',[1,2])->get()->random();

        $monto_pagado = Pago::where('obligacione_id', $obligacione->id)->sum('monto');

        $maximo = $obligacione->montofinal - $monto_pagado;
 
        return [
            'cuenta_id' => Cuenta::all()->random()->id,
            'obligacione_id' => $obligacione->id,
            'monto' => $this->faker->numberBetween($min = 1, $max = $maximo),
            'fechapago' => $this->faker->dateTimeThisYear($max = '2021-05-22', $timezone = null)->format('Y-m-d'),
            'empleado_id' => Empleado::all()->random()->id,
        ];
    }
}
