<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\modules_system;
use App\Models\Report;
use App\Models\responsible;
use App\Models\System;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function index(Request $request, $id)
    {
        $reporte = Report::findOrFail($id); //Buscar el id del reporte

        $folio = $reporte->folio;

        $area_id = $reporte->areas;
        $area = Report::where('areas', $area_id)->get();

        $system_id = $reporte->systems;
        $system = Report::where('systems', $system_id)->get();

        $type_id = $reporte->types_reports;
        $type = Report::where('types_reports', $type_id)->get();

        // Aqui va lo de la fecha de entrega

        $user_id = $reporte->reporting_user;
        $user = User::where('id', $user_id)->get();

        $description = $reporte->description;

        // NO FUNCIONAAA
        $module_id = $reporte->modules_systems;
        $module=Report::where('modules_systems',$module_id)->get();

        $descriptionA = $reporte->descriptionA;

        // Este por ahora es con el user

        // NO FUNCIONAAA
        $responsables_id = $reporte->responsibles;
        $responsables=Report::where('responsibles',$responsables_id)->get();

        $fecha = $reporte->application_date;
        $fecha_aplication = date("d/m/Y", strtotime($fecha));  //Formateo de fecha
       

        $reportdate = $reporte->report_date;
        $report_date = date("d/m/Y", strtotime($reportdate));
        $pdf = PDF::loadView('pdf', compact('folio', 'area', 'system', 'type', 'user', 'description', 'module', 'descriptionA', 'responsables', 'fecha_aplication', 'report_date')); //Para mostrar desde el navegador

        return $pdf->stream();
    }
}
