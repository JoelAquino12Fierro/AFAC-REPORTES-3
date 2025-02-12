<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class moduleController extends Controller
{
    public function store(Request $request){
        // Validación del registro
        $validator = Validator::make($request->all(),[
            'module'=>'required|string|max:255'
        ]);
        // Si la validación falla, devolver errores en JSON
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }
        // Guardar al modelo

        $module= new Module();
        // Primero BD -> Form
        $module->modules_name=$request->module;

        $module->save();
        return view('catalogos');
    }
    
}
