<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\modules_system;
use App\Models\System;
use Illuminate\Http\Request;

class catalogsController extends Controller
{
    public function index()
    {
        $system = System::all();
        $modules = Module::all();
        return view('catalogos', compact('system', 'modules'));
    }
    public function store(Request $request)
    {

        // $validate = $request->validate([
        //     'system' => 'required|exists:systems,id',
        //     'module' => 'required|existe:modules,id'
        // ]);

        $sysmod= new modules_system();
        $sysmod->id_systems=$request->system;
        $sysmod->id_modules=$request->module;
        $sysmod->save();
        return redirect()->route('catalogos')->with('success', 'Relación creada correctamente.');
    }
}
