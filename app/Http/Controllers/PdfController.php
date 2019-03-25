<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function pdf()
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
        **/
        //$products = Product::all();

        $pdf = PDF::loadView('pdf.prestamo');

        return $pdf->download('prueba.pdf');
    }
}
