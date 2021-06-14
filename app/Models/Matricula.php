<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;
use App\Models\Asistencia;
use App\Models\Grupo;
use App\Models\Empleado;
use App\Models\Obligacione;

class Matricula extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function alumno(){
    	return $this->belongsTo(Alumno::class);
    }

	public function grupo(){
    	return $this->belongsTo(Grupo::class);
    }

    public function empleado(){ //quien realizó la matrícula
    	return $this->belongsTo(Empleado::class);
    }

    public function obligaciones(){
        return $this->hasMany(Obligacione::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }

    public function alumnoUnidades(){
        return $this->hasMany(Alumno_unidade::class);
    }

    public function asistenciaClase(Clase $clase){
        return Asistencia::where('clase_id', $clase->id)->where('matricula_id', $this->id)->first();
    }

    public function asistenciasUnidad(Unidad $unidad){
        return Asistencia::where('matricula_id', $this->id)
                ->whereHas('clase', function($q) use ($unidad){ 
                    $q->whereHas('unidad', function($qu) use ($unidad){ 
                        $qu->where('id', $unidad->id); 
                    })
                ->where('asistencia', '0');
        })->get();
    }

}
/*
    Estados = [
        0 => Activo/Matriculado
        1 => Retirado
        2 => Suspendido
    ]
*/