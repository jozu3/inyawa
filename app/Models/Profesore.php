<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unidad;
use App\Models\User;

class Profesore extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function unidad(){
        return $this->hasOne(Unidad::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function unidadsqueenseño($grupo_id){
    	$unidadsqueenseño = Unidad::where('grupo_id', $grupo_id)->where('profesore_id', auth()->user()->profesore->id)->get();
    	return $unidadsqueenseño;
    }
}