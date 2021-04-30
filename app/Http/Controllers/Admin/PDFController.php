<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matricula;
use PDF;

class PDFController extends Controller
{
    public function reciboMatricula()
    {
    	$matricula = Matricula::find($_GET['idmatricula']);


        $data = [
            'title' => 'Hola mundo estoy imprimiendo.com',
            'date' => date('m/d/Y'),
            'matricula' => $matricula
        ];
        
      //  dd($matricula);
        $pdf = PDF::setPaper('a4', 'vertical')->loadView('admin.reports.recibo_matricula', $data);
    	
        return $pdf->stream('imprimiendo.pdf');
    }
}
