<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('can:student.home');
    }
    
    public function index(){

        $matriculas = auth()->user()->alumno->matriculas;

        return view('student.index', compact('matriculas'));
    }
}
