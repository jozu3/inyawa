<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pago;
use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Unidad;
use App\Observers\PagoObserver;
use App\Observers\UnidadObserver;
use App\Observers\AlumnoObserver;
use App\Observers\MatriculaObserver;

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
    public function boot()
    {
        Pago::observe(PagoObserver::class);
        Unidad::observe(UnidadObserver::class);
        Alumno::observe(AlumnoObserver::class);
        Matricula::observe(MatriculaObserver::class);
    }
}
