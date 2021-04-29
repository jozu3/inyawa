<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seguimiento;
use App\Models\Alumno;

class Contacto extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function seguimientos(){
        return $this->hasMany(Seguimiento::class);
    }

    public function alumno(){
        return $this->hasOne(Alumno::class);
    }
    
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function seguimientosVendedor(){
        
    }
}
