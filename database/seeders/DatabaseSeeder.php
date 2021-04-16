<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seguimiento;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ContactoSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(ProfesoreSeeder::class);
        Seguimiento::factory(50)->create();
    }
}