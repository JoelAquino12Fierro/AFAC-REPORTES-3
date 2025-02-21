<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UsController extends Controller
{
    public function index() //Mostrar en tabla
    {
        // Para traer los nombres
        $user = User::paginate(10);
        return view('users', compact('user'));
    }
    public function destroy($id)
    {
        try {

            $user = User::findOrFail($id);

            DB::table('responsibles')->where('users', $id)->delete();
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Usuario eliminado correctamente.'

            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar usuario.'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->paternal_surname = $request->apeP;
            $user->maternal_surname = $request->apeM;
            $user->email = $request->email;
            $user->save();
    

            DB::table('responsibles')->updateOrInsert(
                ['users' => $id],
                ['areas' => $request->editArea, 'positions' => $request->editPosition]
            );
    
            return response()->json([
                'success' => true,
                'message' => 'Usuario actualizado correctamente.',
                'user_name' => $user->name
            ]);
        } catch (\Exception $e) {
            Log::error(" Error al actualizar usuario: " . $e->getMessage());
    
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el usuario.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    

    public function getUserArea($id)
    {
        try {
            $responsibility = DB::table('responsibles')
                ->where('users', $id)
                ->select('areas', 'positions')
                ->first();
            if (!$responsibility) {
                return response()->json(['error' => 'Usuario no tiene área asignada'], 404);
            }
            return response()->json($responsibility);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'number' => 'required|unique:users,id',
                'name' => 'required|string|max:255',
                'apeP' => 'required|string|max:255',
                'apeM' => 'nullable|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:2|confirmed',

            ]);

            $user = new User();
            $user->id = $request->number;
            $user->name = $request->name;
            $user->paternal_surname = $request->apeP;
            $user->maternal_surname = $request->apeM;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado correctamente.',
                'user_id' => $user->id,
                'user_name' => $user->name
            ]);
        } catch (\Exception $e) {
            Log::error(" Error al registrar usuario: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar el usuario.'
            ], 500);
        }
    }

    public function areas(Request $request)
    {
        try {
            $areas = DB::table('areas')->select('id', 'areas_name')->get();

            return response()->json($areas);
        } catch (\Exception $e) {
            Log::error(' Error al obtener áreas: ' . $e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
    public function getPositionsByArea($areaId)
    {
        try {
            // Obtener los IDs de posiciones relacionadas con el área seleccionada
            $positionIds = DB::table('positions_areas')
                ->where('areas', $areaId)
                ->pluck('positions');

            // Obtener los nombres de las posiciones
            $positions = DB::table('positions')
                ->whereIn('id', $positionIds)
                ->select('id', 'name')
                ->get();

            return response()->json($positions);
        } catch (\Exception $e) {
            Log::error(" Error al obtener posiciones: " . $e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
    public function storeResponsibility(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'area_id' => 'required|exists:areas,id',
                'position_id' => 'required|exists:positions,id',
            ]);

            DB::table('responsibles')->insert([
                'users' => $request->user_id,
                'areas' => $request->area_id,
                'positions' => $request->position_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Responsibility registrada correctamente.'
            ]);
        } catch (\Exception $e) {
            Log::error(" Error al registrar responsibility: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error al registrar responsibility.'
            ], 500);
        }
    }


    public function getAllAreas()
    {
        try {
            $areas = DB::table('areas')->select('id', 'areas_name')->get();
            return response()->json($areas);
        } catch (\Exception $e) {
            Log::error('Error al obtener áreas: ' . $e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }


    public function getUserAreaAndPosition($id)
    {
        try {
            $responsibility = DB::table('responsibles')
                ->where('users', $id)
                ->join('areas', 'responsibles.areas', '=', 'areas.id')
                ->join('positions', 'responsibles.positions', '=', 'positions.id')
                ->select('responsibles.areas', 'responsibles.positions', 'areas.areas_name', 'positions.name as position_name')
                ->first();

            if (!$responsibility) {
                return response()->json(['error' => 'Usuario sin área asignada'], 404);
            }

            return response()->json($responsibility);
        } catch (\Exception $e) {
            Log::error(" Error al obtener área y posición del usuario: " . $e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }
}
