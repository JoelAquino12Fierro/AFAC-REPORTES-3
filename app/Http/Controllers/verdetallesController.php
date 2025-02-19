<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class verdetallesController extends Controller
{

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'module' => 'required|exists:modules_systems,modules', // Corregido "exists"
    //         'description' => 'required|string',
    //         'evidence' => 'nullable|file|mimes:png,jpg,jpeg|max:10240',
    //         'responsable' => 'required|exists:responsibles,users'
    //     ]);
        
    //     $reporte = Report::findOrFail($id);
    //     $reporte->modules_systems = $validatedData['module'];
    //     $reporte->descriptionA=$validatedData['description'];
    //     $reporte->responsibles=$validatedData['responsable'];
    //     $reporte->status='1';
    //     $reporte->save();
        
    //     if ($request->hasFile('evidence')){
    //         $file=$request->file('evidence');
    //         $filename = $reporte->folio .'A' . '.' . $file->getClientOriginalExtension();
    //         $filePath = $file->move('evidence\admi', $filename, 'public');
    //         $reporte->evidenceA=$filePath;

    //     }
    //     $reporte->save();
    //     return redirect()->route('table.index')->with('success', 'Reporte creado correctamente.');
    // }
    public function update(Request $request, $id)
{
    // Validar los datos recibidos
    $validatedData = $request->validate([
        'module' => 'required|exists:modules_systems,modules',
        'description' => 'required|string',
        'evidence' => 'nullable|file|mimes:png,jpg,jpeg|max:10240',
        'responsable' => 'required|string'
    ]);

    try {
        $reporte = Report::findOrFail($id);
        $reporte->modules_systems = $validatedData['module'];
        $reporte->descriptionA = $validatedData['description'];
        $reporte->responsibles = $validatedData['responsable'];
        $reporte->status = '1';

        // Guardar el archivo si se sube uno nuevo
        if ($request->hasFile('evidence')) {
            $file = $request->file('evidence');
            $filename = $reporte->folio . 'A' . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('evidence/admi', $filename, 'public'); // Guarda en storage/public/evidence/admi
            $reporte->evidenceA = $filePath;
        }

        $reporte->save();

        return response()->json(['success' => true, 'message' => 'Reporte actualizado correctamente.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

}




