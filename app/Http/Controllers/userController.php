<?php

namespace App\Http\Controllers;

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

    // Para agregar un nuevo usuario
    public function store(Request $request)
    {

    }

}
