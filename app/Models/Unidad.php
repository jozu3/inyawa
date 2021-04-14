<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grupo;
use App\Models\Profesore;
use App\Models\Nota;

class Unidad extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function grupo(){
    	return $this->belongsTo(Grupo::class);
    }

    public function profesore(){
    	return $this->belongsTo(Profesore::class);
    }

    public function notas(){
        return $this->hasMany(Nota::class);
    }
}
