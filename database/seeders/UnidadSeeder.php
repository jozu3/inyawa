<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidad;
use App\Models\Nota;
use Faker\Generator as Faker;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $unidades = Unidad::factory(500)->create();
        

        foreach ($unidades as $unidad){
        	Nota::create([
        		'unidad_id' => $unidad->id,
	            'descripcion' => $faker->word(),
	            'valor' => 0,
	            'tipo' => 1,
        	]);

        	$val = $faker->randomDigitNot(0);
        	Nota::create([
        		'unidad_id' => $unidad->id,
	            'descripcion' => $faker->word(),
	            'valor' => ($val)/10,
	            'tipo' =>0,
        	]);

        	Nota::create([
        		'unidad_id' => $unidad->id,
	            'descripcion' => $faker->word(),
	            'valor' => (10-$val)/10,
	            'tipo' =>0,
        	]);
        }
    }
}
