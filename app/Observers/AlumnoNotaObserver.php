<?php

namespace App\Observers;

use App\Models\Alumno_nota;

class AlumnoNotaObserver
{
    /**
     * Handle the Alumno_nota "created" event.
     *
     * @param  \App\Models\Alumno_nota  $alumno_nota
     * @return void
     */
    public function created(Alumno_nota $alumno_nota)
    {
        $nota = 0;

        foreach ($alumno_nota->alumnoUnidade->alumnoNotas as $alnot){
            $nota += $alnot->valor*$alnot->nota->valor;
        }


        $alumno_nota->alumnoUnidade->update([
            'nota' => $nota
        ]);
    }

    /**
     * Handle the Alumno_nota "updated" event.
     *
     * @param  \App\Models\Alumno_nota  $alumno_nota
     * @return void
     */
    public function updated(Alumno_nota $alumno_nota)
    {
        $nota = 0;

        foreach ($alumno_nota->alumnoUnidade->alumnoNotas as $alnot){
            $nota += $alnot->valor*$alnot->nota->valor;
        }


        $alumno_nota->alumnoUnidade->update([
            'nota' => $nota
        ]);
    }

    /**
     * Handle the Alumno_nota "deleted" event.
     *
     * @param  \App\Models\Alumno_nota  $alumno_nota
     * @return void
     */
    public function deleted(Alumno_nota $alumno_nota)
    {
        //
    }

    /**
     * Handle the Alumno_nota "restored" event.
     *
     * @param  \App\Models\Alumno_nota  $alumno_nota
     * @return void
     */
    public function restored(Alumno_nota $alumno_nota)
    {
        //
    }

    /**
     * Handle the Alumno_nota "force deleted" event.
     *
     * @param  \App\Models\Alumno_nota  $alumno_nota
     * @return void
     */
    public function forceDeleted(Alumno_nota $alumno_nota)
    {
        //
    }
}
