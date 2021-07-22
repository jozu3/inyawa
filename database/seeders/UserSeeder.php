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
            'email' => 'scruz@inyawaperu.com',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Admin');

        User::create([
            'name' => $nom_admin_2.' '.$ape_admin_2,
            'email' => 'briksonalarcon660@gmail.com',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Admin');

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

        $nom_admin_3 = 'Carlos';
        $ape_admin_3 = 'Cumba';

//Coordinador academico
        User::create([
            'name' => $nom_admin_3.' '.$ape_admin_3,
            'email' => 'direccionacademica@inyawaperu.com',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Coordinador académico');

        Empleado::create([
            'nombres' => $nom_admin_3,
            'apellidos' => $ape_admin_3,
            'telefono' => '987564321',
            'user_id' => 3,
        ]);


//Asistente
        $nom_admin_4 = 'Karol';
        $ape_admin_4 = 'Mendoza';


        User::create([
            'name' => $nom_admin_4.' '.$ape_admin_4,
            'email' => 'karolinyawaperu@gmail.com',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Asistente');

        Empleado::create([
            'nombres' => $nom_admin_4,
            'apellidos' => $ape_admin_4,
            'telefono' => '987564321',
            'user_id' => 4,
        ]);


//Vendedor

        $nom_admin_5 = 'Martin';
        $ape_admin_5 = 'Carbajal';


        User::create([
            'name' => $nom_admin_5.' '.$ape_admin_5,
            'email' => 'm.carbajal@inyawaperu.com',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Vendedor');

        Empleado::create([
            'nombres' => $nom_admin_5,
            'apellidos' => $ape_admin_5,
            'telefono' => '987564321',
            'user_id' => 5,
        ]);        

    }
}
