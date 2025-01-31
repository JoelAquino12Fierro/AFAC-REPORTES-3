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
      
        $reporte = Report::findOrFail($id); //Buscar el id del reporte

        $folio = $reporte->folio;

        $area_id = $reporte->areas;
        $area = Area::where('id', $area_id)->get();

        $system_id = $reporte->systems;
        $system = System::where('id', $system_id)->get();

        $type_id = $reporte->types_reports;
        $type = types_report::where('id', $type_id)->get();

        $user = $reporte->report_user;
        // $user = User::where('id', $user_id)->get();

        $description = $reporte->description;
        $descriptionA = $reporte->descriptionA;

        $module_id = $reporte->modules_systems;
        $module = Module::where('id', $module_id)->get();

        $responsibilities = $reporte->responsibles; //Obtener el id del departamento
        $dep = Area::where('id', $responsibilities)->get(); //Nombre del departamento

        $img=$reporte->evidenceA;

        $name = DB::table('responsibles as r')
            ->join('users as u', 'u.id', '=', 'r.users')
            ->join('positions as p', 'p.id', '=', 'r.positions')
            ->join('areas as a', 'a.id', '=', 'r.areas')
            ->select('u.name as name', 'u.paternal_surname as p', 'u.maternal_surname as m', 'p.name as position', 'a.areas_name as area')
            ->where('r.areas', $responsibilities)
            ->get();

        $fecha = $reporte->application_date;
        $fecha_aplication = date("d/m/Y", strtotime($fecha));  //Formateo de fecha

        $reportdate = $reporte->report_date;
        $report_date = date("d/m/Y", strtotime($reportdate));

        $pdf = PDF::loadView('pdf', compact('folio', 'area', 'system', 'type', 'user', 'description', 'module', 'descriptionA', 'fecha_aplication', 'report_date', 'dep', 'name','img')); //Para mostrar desde el navegador
        // $pdf->setWatermarkImage(public_path('img/AFAC_color.png'));
        return $pdf->stream();
    }
}
