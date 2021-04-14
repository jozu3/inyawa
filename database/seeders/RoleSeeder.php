<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Asistente']);
        $role3 = Role::create(['name' => 'Vendedor']);
        $role4 = Role::create(['name' => 'Profesor']);
        $role5 = Role::create(['name' => 'Alumno']);

        Permission::create(['name' => 'admin.home', 'description' => 'Ver el admin'])->syncRoles([$role1, $role2, $role3]);

        //Permisos USUARIO
        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar usuarios'])->syncRoles([$role1]);
        //Permisos ROL
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$role1]);
        
        //Permisos Contacto
        Permission::create(['name' => 'admin.contactos.index', 'description' => 'Ver listado de contactos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.contactos.create', 'description' => 'Crear contactos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.contactos.edit', 'description' => 'Editar contatos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.contactos.destroy', 'description' => 'Eliminar Contactos'])->syncRoles([$role1, $role2, $role3]);

        //Permisos Seguimiento
        Permission::create(['name' => 'admin.seguimientos.index', 'description' => 'Ver listado de comentarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.seguimientos.create', 'description' => 'Crear comentarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.seguimientos.edit', 'description' => 'Editar comentarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.seguimientos.destroy', 'description' => 'Eliminar comentarios'])->syncRoles([$role1, $role2, $role3]);
        
        //Permisos Alumno
        Permission::create(['name' => 'admin.alumnos.index', 'description' => 'Ver listado de alumnos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.alumnos.create', 'description' => 'Crear alumnos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.alumnos.edit', 'description' => 'Editar alumnos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.alumnos.destroy', 'description' => 'Eliminar alumnos'])->syncRoles([$role1, $role2, $role3]);

        //Permisos Empleado
        Permission::create(['name' => 'admin.empleados.index', 'description' => 'Ver listado de empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.create', 'description' => 'Crear empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.edit', 'description' => 'Editar empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.destroy', 'description' => 'Eliminar empleados'])->syncRoles([$role1]);

        //Permisos Curso
        Permission::create(['name' => 'admin.cursos.index', 'description' => 'Ver listado de cursos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.create', 'description' => 'Crear cursos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.edit', 'description' => 'Editar cursos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.destroy', 'description' => 'Eliminar cursos'])->syncRoles([$role1, $role2]);

        //Permisos Grupo
        Permission::create(['name' => 'admin.grupos.index', 'description' => 'Ver listado de grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.grupos.create', 'description' => 'Crear grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.grupos.edit', 'description' => 'Editar grupos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.grupos.destroy', 'description' => 'Eliminar grupos'])->syncRoles([$role1, $role2]);

        //Permisos Unidad
        Permission::create(['name' => 'admin.unidads.index', 'description' => 'Ver listado de unidades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.unidads.create', 'description' => 'Crear unidades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.unidads.edit', 'description' => 'Editar unidades'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.unidads.destroy', 'description' => 'Eliminar unidades'])->syncRoles([$role1, $role2]);

        //Permisos Nota
        Permission::create(['name' => 'admin.notas.index', 'description' => 'Ver listado de notas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.notas.create', 'description' => 'Crear notas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.notas.edit', 'description' => 'Editar notas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.notas.destroy', 'description' => 'Eliminar notas'])->syncRoles([$role1, $role2]);

    }
}
