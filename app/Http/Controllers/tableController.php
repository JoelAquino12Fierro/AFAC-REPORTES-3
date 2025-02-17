<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\modules_system;
use App\Models\Report;
use App\Models\System;
use App\Models\types_report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class tableController extends Controller
{
    public function index() //Mostrar en tabla
    {
        $reporte = Report::paginate(10);
        $area = Area::all();
        $system = System::all();
        $type = types_report::all();
        $user = User::all();
        // dd($reporte);

        return view('table', compact('reporte', 'area', 'system', 'type', 'user'));
    }
    public function edit($id) // Manda a la vista de actualizar
    {
        // Encuentra el reporte
        $reporte = Report::findOrFail($id);
        $system_id = $reporte->systems; //Relaciona el id de systems
        $modules_system = modules_system::where('systems', $system_id)->get(); //Filtro (Primero es el de la bd)
        return view('verDetalles', compact('reporte', 'modules_system'));
    }

    public function update(Request $request, $id)
    {
        //Validacion del formulario(name que se les da a los inputs)
        $request->validate([
            'module' => 'required|exists:modules_systems,id_modules',
            'description' => 'required|string',
            'evidence' => 'nullable|file|mimes:png,jpg,jpeg|max:10240',
            'responsable' => 'required',
        ]);

        $report = Report::findOrFail($id);
        $report->update($report->descriptionA=$request->description);
        $report->modules_systems=$request->module;
        $report->descriptionA=$request->evidence;
        $report->responsible=$request->responsible;

        $report->update();

        if ($request->hasFile('evidence')) {
            // Obtener el archivo
            $file = $request->file('evidence');

            // Crear el nombre basado en el folio y el ID
            $filename = $report->folio .'A' . '.' . $file->getClientOriginalExtension();

            // Guardar el archivo en la carpeta 'public/evidences'
            $filePath = $file->move('evidence', $filename, 'public');

            // Asignar la ruta del archivo al modelo
            $report->evidence = $filePath;
        }

        // Guardar el reporte con la información actualizada
        $report->save();

    }


    public function destroy($id) //Elimina
    {
        // Encuentra al usuario
        $reporte = Report::findOrFail($id);
        $reporte->delete();
        return redirect()->route('table.index')->with('success', 'Usuario eliminado correctamente');
    }


}
