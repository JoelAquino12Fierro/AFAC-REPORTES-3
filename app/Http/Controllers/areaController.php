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
            // Almacenando en name lo que recibe del formulario
            $name = $request->area;
            $area = new Area();
            // Primero BD -> Form
            // $area->areas_name = $request->area;
            $area->areas_name = $name;

            $area->save();
            // Respuesta de éxito en JSON
            return response()->json([
                'success' => true,
                'message' => 'Area creada con éxito',
                'areas_name' => $name
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
