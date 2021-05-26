<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Alumno;
use App\Models\Alumno_nota;
use App\Models\Contacto;
use App\Models\Matricula;
use App\Models\Pago;
use App\Models\Seguimiento;
use App\Models\Unidad;
use App\Models\Empleado;
use App\Observers\AlumnoObserver;
use App\Observers\AlumnoNotaObserver;
use App\Observers\ContactoObserver;
use App\Observers\MatriculaObserver;
use App\Observers\PagoObserver;
use App\Observers\SeguimientoObserver;
use App\Observers\UnidadObserver;
use App\Observers\EmpleadoObserver;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
               
            $menu_contactos = [
                'text' => 'Lista de contactos',
                'key' => 'list_contacts',
                'label_color' => 'success',
                'route'  => 'admin.contactos.index',
                'icon' => 'fas fa-fw fa-user',
                'can'  =>   'admin.contactos.index'
            ];

            if (auth()->user()->hasRole(['Admin', 'Asistente', 'Vendedor'])) {
                   
                $nuevos = Contacto::whereIn('estado', [1,2,3,4])->where('newassign', '1')->where('empleado_id', auth()->user()->empleado->id)->count();

                if ($nuevos > 0) {
                    $menu_contactos['label'] = $nuevos;
                }

            }   

            $event->menu->addAfter('ventas', $menu_contactos);


        });


        Pago::observe(PagoObserver::class);
        Unidad::observe(UnidadObserver::class);
        Alumno::observe(AlumnoObserver::class);
        Matricula::observe(MatriculaObserver::class);
        Seguimiento::observe(SeguimientoObserver::class);
        Contacto::observe(ContactoObserver::class);
        Alumno_nota::observe(AlumnoNotaObserver::class);
        Empleado::observe(EmpleadoObserver::class);
    }
}
