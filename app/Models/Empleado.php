<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seguimiento;
use App\Models\Contacto;
use App\Models\User;

class Empleado extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function seguimientos(){
        return $this->hasMany(Seguimiento::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function contactos(){
        return $this->hasMany(Contacto::class);
    }
}
