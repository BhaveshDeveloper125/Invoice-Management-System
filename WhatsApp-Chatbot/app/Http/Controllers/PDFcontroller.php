<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PDFcontroller extends Controller
{
    public function PDFDownloader()
    {
        $data = [
            'title' => 'PDF Title',
            'date' => date('m/d/y'),
        ];
        $pdf = Pdf::loadView('PDFDownloader', $data);
        return $pdf->download('Bhavesh.pdf');
    }
}
