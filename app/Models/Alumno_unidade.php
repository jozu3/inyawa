<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unidad;
use App\Models\Alumno;
use App\Models\Alumno_nota;

class Alumno_unidade extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function unidad(){
    	return $this->belongsTo(Unidad::class);
    }
    
    public function matricula(){
    	return $this->belongsTo(Matricula::class);
    }

    public function alumnoNotas(){
    	return $this->hasMany(Alumno_nota::class);
    }

    public function alumnoNotasorden($orden){
        return Alumno_nota::select('alumno_notas.valor as valoralumno_nota', 'notas.descripcion as descripcionnota', 'notas.tipo as tiponota')->join('notas', 'alumno_notas.nota_id', '=', 'notas.id')->where('alumno_unidade_id', $this->id)->orderBy('notas.tipo', $orden)->get();
    }
}
