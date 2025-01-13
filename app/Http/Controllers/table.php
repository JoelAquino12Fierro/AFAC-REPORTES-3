<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

class table extends Controller
{
    public function index() //Mostrar en tabla
    { 
        $reporte = Reporte::paginate();
        return view('table', compact('reporte'));
    }
    public function edit($id) // Manda a la vista de actualizar
    {
        // Encuentra el reporte
        $reporte = Reporte::findOrFail($id);
        return view('update', compact('reporte'));
    }
    
    public function update(Request $request, $id) // Actualiza
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->update($request->all());
        return redirect()->route('table.index')->with('success', 'Usuario actualizado correctamente');
    }
    public function destroy($id) //Elimina
    {
        // Encuentra al usuario
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();
        return redirect()->route('table.index')->with('success', 'Usuario eliminado correctamente');
    }
}
