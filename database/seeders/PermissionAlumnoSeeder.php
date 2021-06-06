<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionAlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**************************Permisos del alumno*************************/
        $role6 = Role::where('name','Alumno')->first();

        //permisos 

       // Permission::create(['name' => 'student.home', 'description' => 'Ingresar a perfil de estudiante'])->syncRoles([$role6]);
        Permission::create(['name' => 'student.obligaciones.index', 'description' => 'Ver sus obligaciones por pagar'])->syncRoles([$role6]);
        Permission::create(['name' => 'student.pagos.index', 'description' => 'Ver el listado de sus pagos'])->syncRoles([$role6]);


    }
}
