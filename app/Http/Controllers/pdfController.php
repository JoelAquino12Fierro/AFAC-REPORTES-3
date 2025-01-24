<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;

class pdfController extends Controller
{
    public function index(){
        $pdf=PDF::loadView('pdf');
        return $pdf->stream();
    }
}
