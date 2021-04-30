<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;

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
    	return $this->hasMany(Matriculas::class);
    }
}
/*
'0' => 'Por iniciar',
'1' => 'Iniciado',
'2' => 'Terminado',

*/