<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function index() //Mostrar en tabla
    {
        // Para traer los nombres
        $user = User::paginate();
        return view('users', compact('user'));
    }

    // public function create_function()
    // {
    //     $data=Role::all();
    //     return view('newuser',compact('data'));
    // }
    public function destroy($id) //Elimina
    {
        // Encuentra al usuario
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'Usuario eliminado correctamente');
    }
}
