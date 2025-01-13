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
    public function edit($id) //
    {
        // Encuentra al user
        $reporte = Reporte::findOrFail($id);
        return view('update', compact('reporte'));
    }
    // Actualizar
    public function update(Request $request, $id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->update($request->all());
        return redirect()->route('table.tables')->with('success', 'Usuario actualizado correctamente');
    }
}
