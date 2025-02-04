<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class roles extends Controller
{
    public function index() //Mostrar en tabla
    {
        $rol = Role::paginate();

        return view('roles', compact('rol'));
    }
}
