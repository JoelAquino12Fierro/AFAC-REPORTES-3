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
            'report_user' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,png,gif|max:10240', // Máximo 10MB
        ]);

        // Si falla la validación
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        try {
            // Guardar el archivo si se proporciona
            $filePath = null;
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('reports_evidence', 'public');
            }

            // Crear un nuevo registro en la tabla reports
            $report = Report::create([
                'folio' => $request->folio,
                'application_date' => now(),
                'area_id' => $request->area,
                'system_id' => $request->system,
                'type_report_id' => $request->type_report,
                'report_date' => $request->report_date,
                'report_user' => strtoupper($request->report_user),
                'description' => strtoupper($request->description),
                'evidence_path' => $filePath,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => '¡Reporte generado con éxito!',
                'folio' => $report->folio,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al guardar el reporte. Intenta de nuevo.',
            ], 500);
        }
    }
}


