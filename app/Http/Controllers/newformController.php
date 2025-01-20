<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use function Laravel\Prompts\error;

class newformController extends Controller
{
    //vista 
    public function create()
    {
        return view('newForm');
    }
    // CONTROLADOR DE EL FORMULARIO QUE CREA REPORTES NUEVOS 

    public function store(Request $request){
        //dd($request->all());

        $validated = $request->validate([
            'report_date' => 'nullable|date',
            'area' => 'required|string',
            'sistem' => 'required|string',
            'type_report' => 'required|string',
            'description' => 'nullable|string',
            'evidence' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048' // 
        ]);

        //obtener la fecha actual
        $application_date = Carbon::now();
        $report_date = $request->input('report_date', $application_date);

        //generar un folio unico
        $lastFolio = Reporte::max('id') + 1;
        $folio = 'DTIARS' . str_pad($lastFolio, 3, '0', STR_PAD_LEFT);

        //CARGA DE LA EVIDENCIA EN FOMATO IMAGEN
        $evidencePath = null;
        if($request->hasFile('evidence') && $request->file('evidence')->isValid()){
            $evidencePath = $request->file('evidence')->store('evidences', 'public');
        }
        
        //crear el reporte 
        $reporte = new Reporte();
        $reporte->folio = $folio;
        $reporte->application_date = $application_date;
        $reporte->report_date = $report_date;
        $reporte->area = $validated['area'];
        $reporte->system = $validated['system'];
        $reporte->type_report = $validated['type_report'];
        $reporte->description = $validated['description'] ?? null;
        $reporte->evidence = $evidencePath; // Ruta de la imagen en el almacenamiento
        $reporte->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('newform.create')->with('success', 'Reporte creado exitosamente.');
    }
}
