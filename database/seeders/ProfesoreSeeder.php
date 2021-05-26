<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Profesore;
use App\Models\User;

class ProfesoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	$profesores_users = User::factory(15)->create(); // user_ids -> 3-12


 		foreach ($profesores_users as $profesor_user){
            $profesor_user->assignRole('Profesor');

        	Profesore::create([
        		'nombres' => $faker->firstName(),
	            'apellidos' => $faker->lastName(),
	            'telefono' => $faker->phoneNumber(),
	            'user_id' => $profesor_user->id
        	]);
        }


        
    }
}
