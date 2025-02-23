<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\Report;

class pdf2 extends Controller
{
    public function index(Request $request, $id)
    {


        // Instancia
        $pdf = app('dompdf.wrapper');

        // reporte con sus relaciones definidas en el modelo
        $reporte = Report::with(['area', 'system', 'typeReport', 'module', 'responsible'])->findOrFail($id);

        // Cargar la vista 
        $pdf->loadView('pdf2', compact('reporte'));

        // Mostrar 
        return $pdf->stream('documento.pdf');
    }
}
