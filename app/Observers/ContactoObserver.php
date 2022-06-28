<?php

namespace App\Observers;

use App\Models\Contacto;

class ContactoObserver
{
    /**
     * Handle the Contacto "created" event.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return void
     */
    public function creating(Contacto $contacto)
    {
        if (! \App::runningInConsole()) {
            if (!auth()->user()->can('admin.contactos.asignarVendedor')) {
                $contacto->empleado_id = auth()->user()->empleado->id;
            }   
        }
    }

    /**
     * Handle the Contacto "updated" event.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return void
     */
    public function updated(Contacto $contacto)
    {
        if(isset($contacto->alumno->user)){
            $contacto->alumno->user->update([
                'name' => $contacto->nombres . ' '. $contacto->apellidos
            ]);
        }
    }

    /**
     * Handle the Contacto "deleted" event.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return void
     */
    public function deleted(Contacto $contacto)
    {
        //
    }

    /**
     * Handle the Contacto "restored" event.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return void
     */
    public function restored(Contacto $contacto)
    {
        //
    }

    /**
     * Handle the Contacto "force deleted" event.
     *
     * @param  \App\Models\Contacto  $contacto
     * @return void
     */
    public function forceDeleted(Contacto $contacto)
    {
        //
    }
}
