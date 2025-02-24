<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Area;
use App\Models\Module;
use App\Models\modules_system;
use App\Models\Report;
use App\Models\responsible;
use App\Models\System;
use App\Models\types_report;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function index(Request $request, $id)
    {


        // Instancia
        $pdf = app('dompdf.wrapper');

        // reporte con sus relaciones definidas en el modelo
        $reporte = Report::with(['area', 'system', 'typeReport', 'module', 'responsible'])->findOrFail($id);
        // Calcular la fecha formateada y guardarla en una variable separada
        $formatted_date = date('d-m-Y', strtotime($reporte->application_date));

        $pdf->loadView('pdf2', compact('reporte', 'formatted_date'));

        // Mostrar 
        return $pdf->stream('documento.pdf');
    }
}
