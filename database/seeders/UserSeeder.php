<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Seguimiento;
use App\Models\Empleado;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Josué Vitate',
            'email' => 'josue.vitate@gmail.com',
            'password' => bcrypt('12345678j')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Brckson',
            'email' => 'brik@gmail.com',
            'password' => bcrypt('12345678j')
        ])->assignRole('Vendedor');

        Empleado::create([
            'nombres' => 'Josué',
            'apellidos' => 'Vitate',
            'telefono' => '987564321',
            'user_id' => 1,
        ]);
        
        Empleado::create([
            'nombres' => 'Brikson',
            'apellidos' => 'Perez',
            'telefono' => '987564321',
            'user_id' => 2,
        ]);

        
        $users = User::factory(3)->create();


    }
}
