<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class verdetallesController extends Controller
{
    public function update(Request $request, $id)
    {
      
        $request->validate([
            'module' => 'required|exists:modules_systems,id_modules',
            'description' => 'required|string',
            'evidence' => 'nullable|file|mimes:png,jpg,jpeg|max:10240',
            'responsable' => 'required',
        ]);

        $report = Report::findOrFail($id);

        // Actualizar solo los campos que no son null
        $report->update([
            'modules_systems' => $request->module,
            'descriptionA' => $request->description,
            'responsible' => $request->responsable
        ]);

        // if ($request->hasFile('evidence')) {
        //     // Obtener el archivo
        //     $file = $request->file('evidence');

        //     // Crear el nombre basado en el folio y el ID
        //     $filename = $report->folio . 'A' . '.' . $file->getClientOriginalExtension();

        //     // Guardar el archivo en la carpeta 'public/evidences'
        //     $filePath = $file->move('evidence', $filename, 'public');

        //     // Asignar la ruta del archivo al modelo
        //     $report->evidence = $filePath;
        //     $report->save();
        // }

        // Guardar el reporte con la información actualizada
        $report->save();

        // Redireccionar o devolver respuesta
        // return redirect()->route('reports.detalles', $report->id)->with('success', 'Reporte actualizado correctamente.');
    }
}
