<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;
use App\Models\User;
use Faker\Generator as Faker;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        //vendedores
        $vendedores_users = User::factory(7)->create(); // user_ids -> 13-19

        foreach ($vendedores_users as $vendedor){
            $vendedor->assignRole('Vendedor');
        }

        Empleado::factory(7)->create();
        //Coordinador academico
        $coord_user = User::factory(1)->create()[0]->assignRole('Coordinador académico');

        Empleado::create([
            'nombres' => $faker->firstName(),
            'apellidos' => $faker->lastName(),
            'telefono' => $faker->phoneNumber(),
            'user_id' => $coord_user->id,
        ]);
    }
}
