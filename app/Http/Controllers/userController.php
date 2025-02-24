<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class userController extends Controller
{
    use WithPagination;
    public function index() //Mostrar en tabla
    {
        $users = User::paginate(5);

        return view('users', compact('users'));
    }

    // public function create_function()
    // {
    //     $data=Role::all();
    //     return view('newuser',compact('data'));
    // }

}
