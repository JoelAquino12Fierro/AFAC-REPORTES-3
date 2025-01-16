<?php

namespace App\Http\Controllers;
use App\Models\Area;
use Illuminate\Http\Request;

class areaController extends Controller
{
    public function store(Request $request){
        // Validación del registro
        $validate=$request->validate([
            'area'=>'required|string|max:255'
        ]);
        // Guardar al modelo

        $area= new Area();
        // Primero BD -> Form
        $area->areas_name=$request->area;

        $area->save();
        return view('catalogos');
    }
}
