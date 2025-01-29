<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class moduleController extends Controller
{
    public function store(Request $request){
        // Validación del registro
        $validate=$request->validate([
            'module'=>'required|string|max:255'
        ]);
        // Guardar al modelo

        $module= new Module();
        // Primero BD -> Form
        $module->modules_name=$request->module;

        $module->save();
        return view('catalogos');
    }
    
}
