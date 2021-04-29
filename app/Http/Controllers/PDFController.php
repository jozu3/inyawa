<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'Hola mundo estoy imprimiendo.com',
            'date' => date('m/d/Y'),
            
        ];
         
        $pdf = PDF::loadView('admin.reports.recibo_matricula', $data);
    
        return $pdf->stream('imprimiendo.pdf');
    }
}
