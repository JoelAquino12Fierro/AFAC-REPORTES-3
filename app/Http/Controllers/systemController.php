<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class systemController extends Controller
{
    public function store(Request $request)
    {
        // Validación del registro
        $validator = Validator::make($request->all(), [
            'system' => 'required|string|max:255'
        ]);
        // Si la validación falla, devolver errores en JSON
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }
        // Guardar al modelo
        try {
            // Almacenando en name lo que recibe del formulario
            $name = $request->system;
            $sys = new System();
            // Primero BD -> Form
            $sys->systems_name= $name;

            $sys->save();
            // Respuesta de éxito en JSON
            return response()->json([
                'success' => true,
                'message' => 'Area creada con éxito',
                'systems_name' => $name
            ]);
        } catch (\Exception $e) {
            // Respuesta de error en JSON
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar el area',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
