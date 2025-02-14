<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class areaController extends Controller
{
    public function store(Request $request)
    {
        // Validación del registro
        $validator = Validator::make($request->all(), [
            'area' => 'required|string|max:255'
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
            // Obtener el nombre del módulo
            $name = $request->area;
            // Verificar si el módulo ya existe
            $existingModule = Area::where('areas_name', $name)->first();
            if ($existingModule) {
                return response()->json([
                    'success' => false,
                    'message' => "El área que intentas crear ya existe",
                ], 400);
            }
            $area = new Area();
            $area->areas_name = $name;
            $area->save();
            // Respuesta de éxito en JSON
            return response()->json([
                'success' => true,
                'message' => 'Área creada con éxito:<br><strong>' . strtoupper($name) . '</strong>',
            ]);
        } catch (\Exception $e) {
            // Respuesta de error en JSON
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar el Area',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
