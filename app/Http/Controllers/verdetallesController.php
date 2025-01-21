<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class verdetallesController extends Controller
{
    public function store(Request $request, $id)
    {
        //Validacion del formulario(name que se les da a los inputs)
        $request->validate([
            'module' => 'required',
            'description' => 'required|string',
            'evidence' => 'nullable|file|mimes:png,jpg,jpeg|max:10240',
            'responsable' => 'required|exists:users,id',
        ]);
        
        //Encuentra el reporte
        $report=Report::findOrFail($id);
        //BD = name inputs
        $report->id=$request->id;
        $report->module=$request->module;
        $report->descriptionA=$request->descriptionA;
        // $report->evidenceA=$request->evidence;
        $report->responsible=$request->responsable;
        // $report->status=update($request->status->1);

        if ($request->hasFile('evidence')) {
            $filePath = $request->file('evidence')->store('public', 'evidence');
            $report->evidence = $filePath;
        }
        // Guarda el reporte
        $report->save();
        return redirect()->route('reports.create')->with('success', 'Reporte creado correctamente.');
    }
}
