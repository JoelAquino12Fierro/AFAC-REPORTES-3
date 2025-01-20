<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class newuserController extends Controller
{
    public function create_function()
    {
        $data=Role::all();
        return view('newuser',compact('data'));
    }
}
