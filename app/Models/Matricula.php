<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alumno;
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
}
