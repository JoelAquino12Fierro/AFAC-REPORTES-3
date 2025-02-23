<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\System;
use App\Models\types_report;
use App\Models\Report;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class newformController extends Controller
{


    // Mostrar en el formulario
    public function create_function()
    {
        $area = Area::all();
        $system = System::all();
        $type = types_report::all();
        // $user = User::all();
        $lastFolio = Report::max('id') + 1; //Encontrar el ultimo id
        $folio = 'DTIARS-' . str_pad($lastFolio, 3, '0', STR_PAD_LEFT);
        $date = date("d/m/Y");

        return view('newForm', compact('area', 'system', 'type', 'folio', 'date'));
    }

    // Guardar
    public function store(Request $request)
{
    // Validación de los datos
    $validator = Validator::make($request->all(), [
        'area' => 'required|exists:areas,id',
        'system' => 'required|exists:systems,id',
        'type_report' => 'required|exists:types_reports,id',
        'report_date' => 'required|date',
        'description' => 'required|string',
        'report_user' => 'required|string',
        'file' => 'nullable|file|mimes:png,jpg,jpeg|max:10240'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 400);
    }

    try {
        // Generar el folio dinámicamente
        $lastId = Report::max('id') + 1;
        $folio = 'DTIARS-' . str_pad($lastId, 3, '0', STR_PAD_LEFT);

        // Crear el reporte
        $report = new Report();
        $report->folio = $folio;
        $report->application_date = now();
        $report->report_date = $request->report_date;
        $report->description = strtoupper($request->description);
        $report->area_id = $request->area;
        $report->system_id = $request->system;
        $report->type_report_id = $request->type_report;
        $report->report_user = strtoupper($request->report_user);

        // Si se adjunta un archivo, guardarlo en public/evidence/user
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $folio . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('evidence/user', $filename, 'public');
            $report->evidence_path = $filePath;
        }

        $report->save();

        return response()->json([
            'success' => true,
            'message' => 'Reporte creado correctamente.',
            'folio' => $folio
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al guardar el reporte.',
            'error' => $e->getMessage()
        ], 500);
    }
}

}


