<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Report;
use App\Models\System;
use App\Models\types_report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class tableController extends Controller
{
    public function index() //Mostrar en tabla
    {
        $reporte = Report::paginate(10);
        $area = Area::all();
        $system = System::all();
        $type = types_report::all();
        $user = User::all();
        // dd($reporte);
        return view('table', compact('reporte', 'area', 'system', 'type', 'user'));
    }
    public function updateDescripcion(Request $request, $id)
    {
        try {
            Log::info('📌 Datos recibidos en la API:', [
                'id' => $id,
                'descripcion' => $request->descripcion,
                'responsables' => $request->responsables,
                'modulo' => $request->modulo
            ]);

            $reporte = Report::find($id);

            if (!$reporte) {
                Log::error('❌ Reporte no encontrado con ID: ' . $id);
                return response()->json(['success' => false, 'message' => 'Reporte no encontrado'], 404);
            }

            $reporte->descriptionA = $request->descripcion;
            $reporte->responsibles = $request->responsables;
            $reporte->modules = $request->modulo;

            // Manejo de la imagen
            if ($request->hasFile('evidence')) {
                $archivo = $request->file('evidence');
                $extension = $archivo->getClientOriginalExtension();
                $nombreArchivo = $reporte->folio . '.' . $extension; // Guardar con el folio como nombre
                $ruta = "evidence/admi/" . $nombreArchivo; // Ruta en public/

                // Mover el archivo a public/evidence/admi
                $archivo->move(public_path('evidence/admi'), $nombreArchivo);

                // Guardar la ruta en la BD
                $reporte->evidenceA = $ruta;
            }
            $reporte->status = '1';
            $reporte->save();

            Log::info('✅ Reporte actualizado correctamente.');

            return response()->json([
                'success' => true,
                'message' => 'Reporte actualizado correctamente',
                'folio' => $reporte->folio // Enviar el folio al frontend
            ]);
        } catch (\Exception $e) {
            Log::error('❌ Error al actualizar reporte: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error interno del servidor'], 500);
        }
    }

    public function getModules($systemId)
    {
        try {
            $modules = DB::table('modules_systems')
                ->join('modules', 'modules_systems.modules', '=', 'modules.id')
                ->where('modules_systems.systems', $systemId)
                ->select('modules.id', 'modules.modules_name as nombre')
                ->get();

            return response()->json($modules);
        } catch (\Exception $e) {
            Log::error('Error al obtener módulos: ' . $e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
    public function getAreas()
    {
        try {
            $areas = DB::table('responsibles')
                ->join('areas', 'responsibles.areas', '=', 'areas.id')
                ->select('areas.id', 'areas.areas_name as nombre')
                ->distinct()
                ->get();

            return response()->json($areas);
        } catch (\Exception $e) {
            Log::error('❌ Error al obtener áreas: ' . $e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
    public function destroy($id) // Elimina el reporte
    {
        try {
            $reporte = Report::findOrFail($id);

            // Eliminar la evidencia asociada si existe
            if ($reporte->evidenceA) {
                $rutaArchivo = public_path($reporte->evidenceA);
                if (file_exists($rutaArchivo)) {
                    unlink($rutaArchivo); // Eliminar el archivo físico
                }
            }

            $reporte->delete();

            return redirect()->route('table.index')->with('success', 'Reporte eliminado correctamente');
        } catch (\Exception $e) {
            Log::error('❌ Error al eliminar reporte: ' . $e->getMessage());
            return redirect()->route('table.index')->with('error', 'Error al eliminar el reporte');
        }
    }
}
