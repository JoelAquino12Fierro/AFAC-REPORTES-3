<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Report;
use App\Models\System;
use App\Models\types_report;
use Illuminate\Http\Request;

class ejemplo extends Controller
{
    public function create_function()
    {
        $area = Area::all();
        $system = System::all();
        $type = types_report::all();
        // $user = User::all();
        $lastFolio = Report::max('id') + 1; //Encontrar el ultimo id
        $folio = 'DTIARS-' . str_pad($lastFolio, 3, '0', STR_PAD_LEFT);
        $date = date("d/m/Y");

        return view('ejemplo', compact('area', 'system', 'type', 'folio', 'date'));
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'area' => 'required',
            'system' => 'required',
            'type_report' => 'required',
            'report_date' => 'required|date',
            'report_user' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,png,gif|max:10240',
        ]);

        // Manejo del archivo de evidencia
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('public/evidence/user');
        }

        // Crear un nuevo reporte
        $report = new Report();
        $report->area_id = $request->area;
        $report->system_id = $request->system;
        $report->type_report_id = $request->type_report;
        $report->report_date = $request->report_date;
        $report->report_user = strtoupper($request->report_user);
        $report->description = strtoupper($request->description);
        $report->file_path = $filePath;
        $report->save();

        // Devolver respuesta JSON
        return response()->json(['success' => true]);
    }
}
