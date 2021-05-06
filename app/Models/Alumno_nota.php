<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nota;
use App\Models\Alumno_unidade;

class Alumno_nota extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function alumno_unidade(){
    	return $this->belongsTo(Alumno_unidade::class));
    }
    
    public function nota(){
    	return $this->belongsTo(Nota::class));
    }
}