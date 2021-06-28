<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ContactoController;
use App\Http\Controllers\Admin\SeguimientoController;
use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\UnidadController;
use App\Http\Controllers\Admin\NotaController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\Admin\ProfesoreController;
use App\Http\Controllers\Admin\MatriculaController;
use App\Http\Controllers\Admin\ObligacioneController;
use App\Http\Controllers\Admin\PagoController;
use App\Http\Controllers\Admin\CuentaController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\ClaseController;
use App\Http\Controllers\Admin\AlumnoUnidadeController;
use App\Http\Controllers\Admin\AlumnoNotaController;
use App\Http\Controllers\Admin\ExcelController;

Route::resource('', HomeController::class)->names('admin');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('empleados', EmpleadoController::class)->names('admin.empleados');
Route::resource('alumnos', AlumnoController::class)->names('admin.alumnos');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('contactos', ContactoController::class)->names('admin.contactos');
Route::resource('seguimientos', SeguimientoController::class)->names('admin.seguimientos');
Route::resource('cursos', CursoController::class)->names('admin.cursos');
Route::resource('unidads', UnidadController::class)->names('admin.unidads');
Route::resource('notas', NotaController::class)->names('admin.notas');
Route::resource('profesores', ProfesoreController::class)->names('admin.profesores');
Route::resource('grupos', GrupoController::class)->names('admin.grupos');
Route::resource('matriculas', MatriculaController::class)->names('admin.matriculas');
Route::resource('obligaciones', ObligacioneController::class)->names('admin.obligaciones');
Route::resource('pagos', PagoController::class)->names('admin.pagos');
Route::resource('cuentas', CuentaController::class)->names('admin.cuentas');
Route::resource('clases', ClaseController::class)->names('admin.clases');
Route::resource('alumno_unidades', AlumnoUnidadeController::class)->names('admin.alumno_unidades');
Route::resource('alumno_notas', AlumnoNotaController::class)->names('admin.alumno_notas');

Route::delete('alumno_unidades/destroyfromgroup/{grupo}', [AlumnoUnidadeController::class, 'destroyfromgroup'])->name('admin.alumno_unidades.destroyfromgroup');
Route::delete('clases/destroyfromgroup/{grupo}', [ClaseController::class, 'destroyfromgroup'])->name('admin.clases.destroyfromgroup');
Route::post('clases/storeforgroup/{grupo}', [ClaseController::class, 'storeforgroup'])->name('admin.clases.storeforgroup');
  

  

//Route::resource('pdfs', PDFController::class)->names('pdfs');
Route::get('recibo-matricula/{idmatricula}', [PDFController::class, 'reciboMatricula'])->name('admin.print');
Route::get('reportpagos', [PDFController::class, 'pagos'])->name('admin.print.pagos');

/*Route::resource('grupos', GrupoController::class, ['except' => ['create']])->names('admin.grupos');
Route::get('grupos/create/{id}', [GrupoController::class, 'create'])->name('admin.grupos.create');
*/

Route::get('/report-alumnos-grupo/{grupo}', [ExcelController::class, 'alumnosGrupo'])->name('admin.excel.alumnosGrupo');
	
