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

            // Obtener el nombre del sistema
            $name = $request->system;

            // Verificar existe
            $existingSys = System::where('systems_name', $name)->first();
            if ($existingSys) {
                return response()->json([
                    'success' => false,
                    'message' => "El sistema que intentas crear ya existe",
                ], 400);
            }
            $sys = new System();
            $sys->systems_name = $name;
            $sys->save();
            // Respuesta de éxito en JSON
            return response()->json([
                'success' => true,
                'message' => 'Sistema creado con éxito:<br><strong>' . strtoupper($name) . '</strong>',
            ]);
        } catch (\Exception $e) {
            // Respuesta de error en JSON
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar el Sistema',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
