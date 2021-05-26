<?php

namespace App\Observers;

use App\Models\Alumno;

class AlumnoObserver
{
    /**
     * Handle the Alumno "created" event.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return void
     */
    public function creating(Alumno $alumno)
    {
        //generar codigo de alumno
        $ultimo = Alumno::orderBy('created_at', 'desc')->first();
        $newcodigo = 1000;

        if (!isset($ultimo->codigo) || $ultimo->codigo == 0 || $ultimo->codigo == null){
            $alumno->codigo = $newcodigo;
        } else {
            $newcodigo = $ultimo->codigo;
            $newcodigo++;

            $alumno->codigo = $newcodigo;
        }
    }

    public function created(Alumno $alumno)
    {
        $alumno->user->update([
            'name' => $alumno->contacto->nombres.' '.$alumno->contacto->apellidos
        ]);
    }
    /**
     * Handle the Alumno "updated" event.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return void
     */
    public function updated(Alumno $alumno)
    {
        $alumno->user->update([
            'name' => $alumno->contacto->nombres.' '.$alumno->contacto->apellidos
        ]);
    }

    /**
     * Handle the Alumno "deleted" event.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return void
     */
    public function deleted(Alumno $alumno)
    {
        //
    }

    /**
     * Handle the Alumno "restored" event.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return void
     */
    public function restored(Alumno $alumno)
    {
        //
    }

    /**
     * Handle the Alumno "force deleted" event.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return void
     */
    public function forceDeleted(Alumno $alumno)
    {
        //
    }
}
