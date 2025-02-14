<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class moduleController extends Controller
{
    public function store(Request $request)
    {
        // Validación del registro
        $validator = Validator::make($request->all(), [
            'module' => 'required|string|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }
        try {
            // Obtener el nombre del módulo
            $name = $request->module;
            // Verificar si el módulo ya existe
            $existingModule = Module::where('modules_name', $name)->first();
            if ($existingModule) {
                return response()->json([
                    'success' => false,
                    'message' => "El módulo que intentas crear ya existe",
                ], 400);
            }
            // Crear y guardar el nuevo módulo
            $module = new Module();
            $module->modules_name = $name;
            $module->save();

            return response()->json([
                'success' => true,
                'message' => 'Módulo creado con éxito:<br><strong>' . strtoupper($name) . '</strong>',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar el módulo.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
