<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\modules_system;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class catalogsController extends Controller
{
    public function index(Request $request)
    {
        // $system = System::all();
        // $modules = Module::all();
        // return view('catalogos', compact('system', 'modules'));
        $systems = System::all();
        $modules = Module::all();
        // Obtener todas las relaciones existentes (ID de sistema => [ID de módulos])
        $relations = modules_system::select('systems', 'modules')->get()->groupBy('systems');

        return view('catalogos', compact('systems', 'modules', 'relations'));
    }

    public function store(Request $request)
    {
        try {
            // Obtener ID
            $systemId = $request->system;
            $moduleId = $request->module;

            // Verificar si la relaciónexiste
            $existingRelation = modules_system::where('systems', $systemId)
                ->where('modules', $moduleId)
                ->first();

            if ($existingRelation) {
                return response()->json([
                    'success' => false,
                    'message' => "Este módulo ya está relacionado con el sistema seleccionado.",
                ], 400);
            }

            // Obtener nombres del sistema y módulo
            $system = System::find($systemId);
            $module = Module::find($moduleId);
            // Crear la relación si no existe
            $sysmod = new modules_system();
            $sysmod->systems = $systemId;
            $sysmod->modules = $moduleId;
            $sysmod->save();

            return response()->json([
                'success' => true,
                'message' => "El módulo: <br><strong>" . strtoupper($module->modules_name) . "</strong> <br>ha sido asociado correctamente con el sistema: <br><strong>" . strtoupper($system->systems_name) . "</strong>.",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Error al guardar la relación.",
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
