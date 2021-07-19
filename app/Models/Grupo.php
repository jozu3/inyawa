<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
use App\Models\Matricula;
use App\Models\Alumno_unidade;

class Grupo extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function unidads(){
        return $this->hasMany(Unidad::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function matriculas(){
    	return $this->hasMany(Matricula::class);
    }

    public function matriculasEstado($estados = []){
        $matriculas = Matricula::where('grupo_id', $this->id)->whereIn('estado', $estados)->get();
        return $matriculas;
    }

    public function notasGenerateds(){
        $notas_generadas = 0;

        foreach ($this->unidads as $unidad){
            $notas_generadas += $unidad->alumno_unidades->count();
        }

        return $notas_generadas;
    }

    public function clasesGenerateds(){
        $clases_generadas = 0;

        foreach ($this->unidads as $unidad){
            $clases_generadas += $unidad->clases->count();
        }

        return $clases_generadas;
    }

    public function alumnoUnidadesporMatricula(){
        $alumno_unidades = 0;

        foreach ($this->unidads as $unidad){
            $alumno_unidades = Alumno_unidade::select('unidad_id', 'matricula_id')->where('unidad_id', $unidad->id)->count();
        }

        return $alumno_unidades;
    }

}
/*
Estados
'0' => 'Por iniciar',
'1' => 'Iniciado',
'2' => 'Terminado',

*/