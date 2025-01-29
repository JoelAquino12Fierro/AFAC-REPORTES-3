<?php

namespace App\Http\Controllers;

use App\Models\Area;
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
        $descriptionA = $reporte->descriptionA;


        $module_id = $reporte->modules_systems;
        $module = Module::where('id', $module_id)->get();


        // NO FUNCIONAAA //////////////////////////////
        $responsibilities = $reporte->responsibles;//Obtener el id del departamento
        $dep=Area::where('id',$responsibilities)->get(); //Nombre del departamento

        // Regla sql
        // SELECT users, name, paternal_surname, maternal_surname FROM responsibles r join users u on u.id=r.users WHERE areas=1; 

        // $name = responsible::responsibilities('responsibles as r')
        // ->join('users as u', 'u.id', '=', 'r.users')
        // ->select('u.id as user_id', 'u.name', 'u.paternal_surname', 'u.maternal_surname')
        // ->where('areas', '=', $responsibilities)
        // ->get();

        // $responsables=responsible::where('users',$responsibilities)->get();
        // $profession = responsible::table('responsibilities')->where('areas', '=', $responsibilities)->first();
        // $namerespo=User::()
        // $responsables = User::where('id', $responsibilities)->get();
        // Para el departamento
        






        //////////////////////////////////////////////////////7
        $fecha = $reporte->application_date;
        $fecha_aplication = date("d/m/Y", strtotime($fecha));  //Formateo de fecha


        $reportdate = $reporte->report_date;
        $report_date = date("d/m/Y", strtotime($reportdate));
        $pdf = PDF::loadView('pdf', compact('folio', 'area', 'system', 'type', 'user', 'description', 'module', 'descriptionA', 'fecha_aplication', 'report_date','dep')); //Para mostrar desde el navegador

        return $pdf->stream();
    }
}
