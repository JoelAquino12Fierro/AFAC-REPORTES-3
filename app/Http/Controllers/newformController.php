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
        // $user = User::all();
        $lastFolio = Report::max('id') + 1; //Encontrar el ultimo id
        $folio = 'DTIARS-' . str_pad($lastFolio, 3, '0', STR_PAD_LEFT);
        $date=date("d/m/Y");
        
        return view('newForm', compact('area', 'system', 'type', 'folio','date'));
    }

    // Guardar
    public function store(Request $request)
    {

        // Lo de los id corresponde al nombre de la tabla
        $validated = $request->validate([
            'area' => 'required|exists:areas,id', 
            'system' => 'required|exists:systems,id',
            'type_report' => 'required|exists:types_reports,id',
            'report_date' => 'required|date', 
            // 'report_user' => 'required|exists:users,id', 
            'description' => 'required|string', 
            'report_user' => 'required|string',
            'file' => 'nullable|file|mimes:png,jpg,jpeg|max:10240'
        ]);

        $lastFolio = Report::max('id') + 1; //Encontrar el ultimo id
        $folio = 'DTIARS-' . str_pad($lastFolio, 3, '0', STR_PAD_LEFT);
        // $date=date("d-m-Y");

        $report = new Report();
        $report->folio = $folio;
        $report->application_date = now();
        $report->report_date=$request->report_date;
        $report->description = $request->description;
        $report->areas = $request->area;
        $report->systems = $request->system;
        $report->report_user = $request->report_user;
        $report->types_reports=$request->type_report;

        $report->save();
        // Si existe el archivo
        if ($request->hasFile('file')) {
            // Obtener el archivo
            $file = $request->file('file');

            // Crear el nombre basado en el folio y el ID
            $filename = $report->folio . '.' . $file->getClientOriginalExtension();

            // Guardar el archivo en la carpeta 'public/evidences'
            $filePath = $file->move('evidence\user', $filename, 'public');
                       
            // Asignar la ruta del archivo al modelo
            $report->evidence = $filePath;
        }

        // Guardar el reporte con la información actualizada
        $report->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('newform')->with('success', 'Reporte creado correctamente.');
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
