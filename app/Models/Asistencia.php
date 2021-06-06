<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matricula;

class Asistencia extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    

    public function matricula(){
        return $this->belongsTo(Matricula::class);
    }

}
