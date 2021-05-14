<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profesore;

class ProfesoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profesore::factory(10)->create();
        
    }
}
