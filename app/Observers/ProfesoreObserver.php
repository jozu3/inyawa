<?php

namespace App\Observers;

use App\Models\Profesore;

class ProfesoreObserver
{
    /**
     * Handle the Profesore "created" event.
     *
     * @param  \App\Models\Profesore  $profesore
     * @return void
     */
    public function created(Profesore $profesore)
    {
        $profesore->user->update([
            'name' => $profesore->nombres.' '.$profesore->apellidos
        ]);
    }

    /**
     * Handle the Profesore "updated" event.
     *
     * @param  \App\Models\Profesore  $profesore
     * @return void
     */
    public function updated(Profesore $profesore)
    {
        $profesore->user->update([
            'name' => $profesore->nombres.' '.$profesore->apellidos
        ]);
    }

    /**
     * Handle the Profesore "deleted" event.
     *
     * @param  \App\Models\Profesore  $profesore
     * @return void
     */
    public function deleted(Profesore $profesore)
    {
        //
    }

    /**
     * Handle the Profesore "restored" event.
     *
     * @param  \App\Models\Profesore  $profesore
     * @return void
     */
    public function restored(Profesore $profesore)
    {
        //
    }

    /**
     * Handle the Profesore "force deleted" event.
     *
     * @param  \App\Models\Profesore  $profesore
     * @return void
     */
    public function forceDeleted(Profesore $profesore)
    {
        //
    }
}
