<?php

namespace App\Http\Controllers;

use App\Exports\ReportesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteController extends Controller
{
    public function exportarExcel()
    {
        return Excel::download(new ReportesExport, 'reportes.xlsx');
    }
}
