<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use PDF;
use HTML;

class PdfController extends Controller
{
    
    public function createPdf() {
        $contactos = DB::table('contacts')
                                ->select('id', 'name', 'username', 'email', 'address', 'cellphone', 'image', 'job_title')
                                ->get();

        $pdf = PDF::loadView('pdf.report', ['contactos' => $contactos]);
        return $pdf->stream();
    }
}