<?php

namespace App\Http\Controllers;
use App\Models\Report;
use Illuminate\Http\Request;

class tableController extends Controller
{
    public function index() //Mostrar en tabla
    { 
        $reporte = Report::paginate();
        return view('table', compact('reporte'));
    }
    public function edit($id) // Manda a la vista de actualizar
    {
        // Encuentra el reporte
        $reporte = Report::findOrFail($id);
        return view('update', compact('reporte'));
    }
    
    public function update(Request $request, $id) // Actualiza
    {
        $reporte = Report::findOrFail($id);
        $reporte->update($request->all());
        return redirect()->route('table.index')->with('success', 'Usuario actualizado correctamente');
    }
    public function destroy($id) //Elimina
    {
        // Encuentra al usuario
        $reporte = Report::findOrFail($id);
        $reporte->delete();
        return redirect()->route('table.index')->with('success', 'Usuario eliminado correctamente');
    }
}
