<?php

namespace App\Observers;

use App\Models\Empleado;

class EmpleadoObserver
{
    /**
     * Handle the Empleado "created" event.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return void
     */
    public function created(Empleado $empleado)
    {
        if (isset($empleado->user)){
            $empleado->user->update([
                'name' => $empleado->nombres.' '.$empleado->apellidos
            ]);
        }
    }

    /**
     * Handle the Empleado "updated" event.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return void
     */
    public function updated(Empleado $empleado)
    {
        if (isset($empleado->user)){
            $empleado->user->update([
                'name' => $empleado->nombres.' '.$empleado->apellidos
            ]);
        }
    }

    /**
     * Handle the Empleado "deleted" event.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return void
     */
    public function deleted(Empleado $empleado)
    {
        //
    }

    /**
     * Handle the Empleado "restored" event.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return void
     */
    public function restored(Empleado $empleado)
    {
        //
    }

    /**
     * Handle the Empleado "force deleted" event.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return void
     */
    public function forceDeleted(Empleado $empleado)
    {
        //
    }
}
