<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contacto;
use App\Models\Curso;
use App\Models\User;

class Seguimiento extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function contacto(){
        return $this->belongsTo(Contacto::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
