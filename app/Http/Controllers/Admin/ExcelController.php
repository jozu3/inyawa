<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\AlumnosExport;
use App\Models\Grupo;

class ExcelController extends Controller
{
    public function alumnosGrupo(Grupo $grupo){
        $alumExport = new AlumnosExport();
        return $alumExport->forGroup($grupo->id)->download('alumnos.xlsx');
    }
}
