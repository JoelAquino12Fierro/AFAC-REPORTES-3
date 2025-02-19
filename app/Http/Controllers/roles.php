<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class roles extends Controller
{
    use WithPagination;
    public $role;
    public function index() //Mostrar en tabla
    {
        $roles = Role::paginate(5);

        return view('roles', compact('roles'));
    }

    public function store(Request $request){
    $request->validate([
        'rol' => 'required|string|max:255' // Validamos el input "rol"
    ]);

    // Guardamos en la tabla "roles" usando el campo "name"
    $role = new Role();
    $role->name = $request->rol; // Convertimos "rol" en "name"
    $role->guard_name = 'web'; // Valor por defecto para evitar el error

    $role->save();

    return redirect()->back()->with('success', 'Rol creado correctamente');
    }

    //METODO PARA ACTUALIZAR ROLES
    public function destroy($id)
    {
    $role = Role::findOrFail($id);
    $role->delete();

    return redirect()->back()->with('success', 'Rol eliminado correctamente.');
    }

    
    public function update(Request $request, $id)
    {
    $request->validate([
        'role_name' => 'required|string|max:255', // Validar el nuevo nombre
    ]);

    $role = Role::findOrFail($id);
    $role->update(['name' => $request->role_name]); // Actualizar el nombre del rol

    return redirect()->back()->with('success', 'Rol actualizado correctamente.');
    }

    
}
