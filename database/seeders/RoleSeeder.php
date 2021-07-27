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
        $role4 = Role::create(['name' => 'Coordinador académico']);
        $role5 = Role::create(['name' => 'Profesor']);
        $role6 = Role::create(['name' => 'Alumno']);

        Permission::create(['name' => 'admin.home', 'description' => 'Ver el admin'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

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
        Permission::create(['name' => 'admin.contactos.edit', 'description' => 'Editar contactos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.contactos.editAll', 'description' => 'Editar cualquier contacto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contactos.asignarVendedor', 'description' => 'Asignar vendedor'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contactos.destroy', 'description' => 'Eliminar Contactos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.contactos.destroyAll', 'description' => 'Eliminar cualquier contacto'])->syncRoles([$role1, $role2]);

        //Permisos Seguimiento
        Permission::create(['name' => 'admin.seguimientos.index', 'description' => 'Ver listado de comentarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.seguimientos.create', 'description' => 'Crear comentarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.seguimientos.edit', 'description' => 'Editar comentarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.seguimientos.destroy', 'description' => 'Eliminar comentarios'])->syncRoles([$role1, $role2, $role3]);
        
        //Permisos Alumno
        Permission::create(['name' => 'admin.alumnos.index', 'description' => 'Ver listado de alumnos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.alumnos.create', 'description' => 'Crear alumnos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.alumnos.edit', 'description' => 'Editar alumnos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.alumnos.destroy', 'description' => 'Eliminar alumnos'])->syncRoles([$role1, $role2, $role3, $role4]);

        //Permisos Empleado
        Permission::create(['name' => 'admin.empleados.index', 'description' => 'Ver listado de empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.create', 'description' => 'Crear empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.edit', 'description' => 'Editar empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.empleados.destroy', 'description' => 'Eliminar empleados'])->syncRoles([$role1]);

        //Permisos Curso
        Permission::create(['name' => 'admin.cursos.index', 'description' => 'Ver listado de cursos'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.cursos.create', 'description' => 'Crear cursos'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.cursos.edit', 'description' => 'Editar cursos'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.cursos.destroy', 'description' => 'Eliminar cursos'])->syncRoles([$role1, $role2, $role4]);

        //Permisos Grupo
        Permission::create(['name' => 'admin.grupos.index', 'description' => 'Ver listado de grupos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.grupos.create', 'description' => 'Crear grupos'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.grupos.edit', 'description' => 'Editar grupos'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.grupos.destroy', 'description' => 'Eliminar grupos'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.grupos.viewList', 'description' => 'Ver lista de todos los grupos'])->syncRoles([$role1, $role2, $role4]);

        //Permisos Unidad
        Permission::create(['name' => 'admin.unidads.index', 'description' => 'Ver listado de unidades'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.unidads.create', 'description' => 'Crear unidades'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.unidads.edit', 'description' => 'Editar unidades'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.unidads.destroy', 'description' => 'Eliminar unidades'])->syncRoles([$role1, $role2, $role4, $role5]);

        //Permisos Nota
        Permission::create(['name' => 'admin.notas.index', 'description' => 'Ver listado de notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.notas.create', 'description' => 'Crear notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.notas.edit', 'description' => 'Editar notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.notas.destroy', 'description' => 'Eliminar notas'])->syncRoles([$role1, $role2, $role4, $role5]);

        //Permisos Profesore
        Permission::create(['name' => 'admin.profesores.index', 'description' => 'Ver listado de profesores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.profesores.create', 'description' => 'Crear profesores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.profesores.edit', 'description' => 'Editar profesores'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.profesores.destroy', 'description' => 'Eliminar profesores'])->syncRoles([$role1, $role2]);

        //Permisos Matriculas
        Permission::create(['name' => 'admin.matriculas.index', 'description' => 'Ver listado de matriculas'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.matriculas.create', 'description' => 'Crear matriculas'])->syncRoles([$role1, $role2, $role3,]);
        Permission::create(['name' => 'admin.matriculas.createAll', 'description' => 'Crear matriculas de cualquier contacto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.matriculas.edit', 'description' => 'Editar matriculas'])->syncRoles([$role1, $role2, $role3,]);
        Permission::create(['name' => 'admin.matriculas.destroy', 'description' => 'Eliminar matriculas'])->syncRoles([$role1, $role2, $role3,]);

         //Permisos Obligacione
        Permission::create(['name' => 'admin.obligaciones.index', 'description' => 'Ver listado de obligaciones de pago'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.obligaciones.create', 'description' => 'Crear obligaciones de pago'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.obligaciones.edit', 'description' => 'Editar obligaciones de pago'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.obligaciones.destroy', 'description' => 'Eliminar obligaciones de pago'])->syncRoles([$role1, $role2]);

         //Permisos Pagos
        Permission::create(['name' => 'admin.pagos.index', 'description' => 'Ver listado de pagos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.create', 'description' => 'Crear pagos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.edit', 'description' => 'Editar pagos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.destroy', 'description' => 'Eliminar pagos'])->syncRoles([$role1]);

         //Permisos Cuentas
        Permission::create(['name' => 'admin.cuentas.index', 'description' => 'Ver listado de cuentas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cuentas.create', 'description' => 'Crear cuentas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cuentas.edit', 'description' => 'Editar cuentas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cuentas.destroy', 'description' => 'Eliminar cuentas'])->syncRoles([$role1, $role2]);

        //Permisos Alumno unidad
        Permission::create(['name' => 'admin.alumno_unidades.index', 'description' => 'Ver listado de alumno unidades'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.alumno_unidades.create', 'description' => 'Crear alumno unidades'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.alumno_unidades.edit', 'description' => 'Editar alumno unidades'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.alumno_unidades.destroy', 'description' => 'Eliminar alumno unidades'])->syncRoles([$role1, $role2, $role4, $role5]);

        //Permisos Alumno nota
        Permission::create(['name' => 'admin.alumno_notas.index', 'description' => 'Ver listado de alumno notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.alumno_notas.create', 'description' => 'Crear alumno notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.alumno_notas.edit', 'description' => 'Editar alumno notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.alumno_notas.destroy', 'description' => 'Eliminar alumno notas'])->syncRoles([$role1, $role2, $role4, $role5]);

         //Permisos clases
        Permission::create(['name' => 'admin.clases.index', 'description' => 'Ver listado de clases'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.clases.create', 'description' => 'Crear clases'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.clases.edit', 'description' => 'Editar clases'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.clases.destroy', 'description' => 'Eliminar clases'])->syncRoles([$role1, $role2, $role4, $role5]);

         //Permisos asistencias
        Permission::create(['name' => 'admin.asistencias.index', 'description' => 'Ver listado de asistencias'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.asistencias.create', 'description' => 'Crear asistencias'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.asistencias.edit', 'description' => 'Editar asistencias'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.asistencias.destroy', 'description' => 'Eliminar asistencias'])->syncRoles([$role1, $role2, $role4, $role5]);




    }
}
