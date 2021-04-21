<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Contacto;
use App\Models\Matricula;

class Alumno extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function contacto(){
    	return $this->belongsTo(Contacto::class);
    }

    public function matriculas(){
    	return $this->hasMany(Matricula::class);
    }
}
