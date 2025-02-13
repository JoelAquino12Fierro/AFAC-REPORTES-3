<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class roles extends Controller
{
    use WithPagination;
    public function index() //Mostrar en tabla
    {
        $users = User::paginate(5);

        return view('roles', compact('users'));
    }
}
