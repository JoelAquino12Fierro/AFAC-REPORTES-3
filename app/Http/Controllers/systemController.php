<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class systemController extends Controller
{
    public function store(Request $request){
        // Validación del registro
        $validate=$request->validate([
            'system'=>'required|string|max:255'
        ]);
        // Guardar al modelo

        $system= new System();
        // Primero BD -> Form
        $system->systems_name=$request->system;

        $system->save();
        return view('catalogos');
    }
}
