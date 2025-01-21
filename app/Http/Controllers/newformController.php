<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\System;
use App\Models\types_report;
use App\Models\User;
use App\Models\Report;

class newformController extends Controller
{
    // Mostrar en el formulario
    public function create_function()
    {
        $area = Area::all();
        $system = System::all();
        $type = types_report::all();
        $user = User::all();
        $lastFolio = Report::max('id') + 1; //Encontrar el ultimo id
        $folio = 'DTIARS-' . str_pad($lastFolio, 3, '0', STR_PAD_LEFT);
        return view('newForm', compact('area', 'system', 'type', 'user', 'folio'));
    }

    // Guardar un nuevo reporte(Al presionar el botón)
    public function store(Request $request)
    {
        // Validaciones
        $request->validate([
            'area' => 'required|exists:areas,id',
            'system' => 'required|exists:systems,id',
            'type_report' => 'required|exists:types_reports,id',
            'report_date' => 'required|date',
            'report_user' => 'required|exists:users,id',
            'description' => 'required|string|max:1000',
            'file-upload' => 'nullable|file|mimes:png,jpg,jpeg|max:10240',
        ]);

        // Crear el reporte con los datos iniciales
        $report = new Report();

        // $report->folio = 'DTIARS-' . uniqid();
        $report->application_date = now();
        $report->area_id = $request->area;
        $report->system_id = $request->system;
        $report->type_report_id = $request->type_report;
        $report->report_date = $request->report_date;
        $report->user_id = $request->report_user;
        $report->description = strtoupper($request->description);

        // Guardar temporalmente el reporte para generar el ID
        $report->save();

        // Si existe un archivo cargado, procesarlo
        if ($request->hasFile('file-upload')) {
            // Obtener el archivo
            $file = $request->file('file-upload');

            // Crear el nombre basado en el folio y el ID
            $filename = $report->folio . '-' . $report->id . '.' . $file->getClientOriginalExtension();

            // Guardar el archivo en la carpeta 'public/evidences'
            $filePath = $file->storeAs('evidences', $filename, 'public');

            // Asignar la ruta del archivo al modelo
            $report->evidence = $filePath;
        }

        // Guardar el reporte con la información actualizada
        $report->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('reports.create')->with('success', 'Reporte creado correctamente.');
    }
}






























// namespace App\Http\Controllers;

// use App\Models\Area;
// use App\Models\System;
// use App\Models\types_report;
// use App\Models\User;
// use Illuminate\Http\Request;

// class newformController extends Controller
// {
//     public function create_function(){
//         $area=Area::all();
//         $system=System::all();
//         $type=types_report::all();
//         $user=User::all();
//         return view('newForm', compact('area','system','type','user')); 
//     }
    
    
//     // CONTROLADOR DE EL FORMULARIO QUE CREA REPORTES NUEVOS 


//     public function store(Request $request){

//         $request->validate([
//             'application_date'=>'required|date',
//             'report_date'=>'required|date',
//             'area'=>'required|string',
//             'system'=>'required|string',
//             'type_report'=>'required|string',
//             'reporting_user'=>'required|exists:users,id',
//             'actions'=>'require|string',
//             'description'=>'nullable|string',
//             'evidence'=>'nullable|image|mimes:jpg,png|max:2048',
//         ]);

//         //generar folio con nomeclatura
//     }
// }
