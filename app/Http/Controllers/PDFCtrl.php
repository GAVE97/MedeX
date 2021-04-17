<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFCtrl extends Controller
{
    public function PDF(){
            $pdf = \PDF::loadView('Formatos.prueba');
            return $pdf->stream('prueba.pdf');
    }
}



