<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Seguimiento;
use App\Models\Empleado;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $nom_admin_1 = 'Sebastian';
        $ape_admin_1 = 'Cruz';

        $nom_admin_2 = 'Brikson';
        $ape_admin_2 = 'Alarcon';

        User::create([
            'name' => $nom_admin_1.' '.$ape_admin_1,
            'email' => $nom_admin_1.'.'.$ape_admin_1.'@admin.org',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Admin');

        User::create([
            'name' => $nom_admin_2.' '.$ape_admin_2,
            'email' => $nom_admin_2.'.'.$ape_admin_2.'@admin.org',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Asistente');

        Empleado::create([
            'nombres' => $nom_admin_1,
            'apellidos' => $ape_admin_1,
            'telefono' => '987564321',
            'user_id' => 1,
        ]);
        
        Empleado::create([
            'nombres' => $nom_admin_2,
            'apellidos' => $ape_admin_2,
            'telefono' => '987564321',
            'user_id' => 2,
        ]);

        
        //vendedores
        $vendedores_users = User::factory(7)->create(); // user_ids -> 13-19

        foreach ($vendedores_users as $vendedor){
            $vendedor->assignRole('Vendedor');
        }

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
