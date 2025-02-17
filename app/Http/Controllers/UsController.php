<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsController extends Controller
{
    public function index() //Mostrar en tabla
    {
        // Para traer los nombres
        $user = User::paginate(10);
        return view('users', compact('user'));
    }
    public function destroy($id) //Elimina
    {
        // Encuentra al usuario
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success', 'Usuario eliminado correctamente');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            // 'apeP' => 'nullable|string|max:255',
            // 'apeM' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // 'paternal_surname' => $request->input('apeP'),
            // 'maternal_surname' => $request->input('apeM'),
        ]);

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'user' => $user,
        ], 200);
    }
}
