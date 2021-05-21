<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unidad;
use App\Models\Alumno_nota;

class Nota extends Model
{
    use HasFactory;
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function unidad(){
    	return $this->belongsTo(Unidad::class);
    }

    public function alumnoNota(){
    	return $this->hasMany(Alumno_nota::class);
    }
}
