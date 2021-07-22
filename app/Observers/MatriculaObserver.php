<?php

namespace App\Observers;

use App\Models\Matricula;
use App\Models\Obligacione;

class MatriculaObserver
{
    /**
     * Handle the Matricula "created" event.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return void
     */
    public function creating(Matricula $matricula){
        if (! \App::runningInConsole()) {
            $matricula->empleado_id = auth()->user()->empleado->id;
        }
    }

    public function created(Matricula $matricula)
    {
        $precio_matricula = $matricula->grupo->matricula;
        $precio_cuota = $matricula->grupo->cuota;
        $precio_certificacion = $matricula->grupo->certificacion;
        
        switch ($matricula->tipomatricula) {
            case 0:
                $precio_matricula = $matricula->grupo->matricula;
                $precio_cuota = $matricula->grupo->cuota;
                $precio_certificacion = $matricula->grupo->certificacion;
                break;
            case 1:
                $precio_matricula = $matricula->grupo->matricula2;
                $precio_cuota = $matricula->grupo->cuota2;
                $precio_certificacion = $matricula->grupo->certificacion2;
                break;
            default:
                $precio_matricula = 0;
                $precio_cuota = 0;
                $precio_certificacion = 0;
                break;
        }

        //generar obligacion pago de matricula
        Obligacione::create([
            'matricula_id' => $matricula->id,
            'concepto' => 'Matricula',
            'fechalimite' => date('Y-m-d'),
            'monto' => $precio_matricula,
            'descuento' => 0,
            'montopagado' => 0,
            'montofinal' => $precio_matricula,
            'estado' => 1
        ]);

        $date = null;
        //generar obligacion de cuotas por pagar
        for ($i = 1; $i <= $matricula->grupo->ncuotas; $i++) {

            $meses = $i -1 ;
            $mes = date('m', strtotime( '+'.$meses.'month', strtotime($matricula->grupo->fecha)));
            $dia = date('d', strtotime($matricula->grupo->fecha));

            if ($dia >= 1 && $dia <= 7) {
                $dia_vencimiento = 8;
            }

            if ($dia >= 8 && $dia <= 20) {
                $dia_vencimiento = 12;
            }

            if ($dia >= 21 && $dia <=31) {
                if ($mes == '02') {
                    $dia_vencimiento = 28;
                } else {
                    $dia_vencimiento = 30;
                }
            }

            if ($i == 1) {//cuota 1
                $date = date('Y-m-d', strtotime( '+'.'2'.'day', strtotime($matricula->grupo->fecha)));
            } else {//cuota2 en adelante

                $date = date('Y-m', strtotime( '+'.$meses.'month', strtotime($matricula->grupo->fecha))).'-'.$dia_vencimiento;
            }

            Obligacione::create([
                'matricula_id' => $matricula->id,
                'concepto' => 'Cuota '.$i,
                'fechalimite' => $date,
                'monto' => $precio_cuota,
                'descuento' => 0,
                'montopagado' => 0,
                'montofinal' => $precio_cuota,
                'estado' => 1
            ]);
        }

        //generar obligacion de certificacion

        if (date('m', strtotime($date)) == 1 && $dia_vencimiento == 30){
            $date = date('Y-2-28', strtotime($date));
        } else {
            $date = date('Y-m-d', strtotime( '+1 month', strtotime($date)));
        }

        Obligacione::create([
            'matricula_id' => $matricula->id,
            'concepto' => 'Certificación',
            'fechalimite' => $date,
            'monto' => $precio_certificacion,
            'descuento' => 0,
            'montopagado' => 0,
            'montofinal' => $precio_certificacion,
            'estado' => 1
        ]);

    }

    /**
     * Handle the Matricula "updated" event.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return void
     */
    public function updated(Matricula $matricula)
    {
        //
    }

    /**
     * Handle the Matricula "deleted" event.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return void
     */
    public function deleted(Matricula $matricula)
    {
        //
    }

    /**
     * Handle the Matricula "restored" event.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return void
     */
    public function restored(Matricula $matricula)
    {
        //
    }

    /**
     * Handle the Matricula "force deleted" event.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return void
     */
    public function forceDeleted(Matricula $matricula)
    {
        //
    }
}
