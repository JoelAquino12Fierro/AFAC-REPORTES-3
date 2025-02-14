<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\modules_system;
use App\Models\System;
use Illuminate\Http\Request;

class catalogsController extends Controller
{
    public function index(Request $request)
    {
        // $system = System::all();
        // $modules = Module::all();
        // return view('catalogos', compact('system', 'modules'));
        $systems = System::all();
        $modules = Module::all();
        // Obtener todas las relaciones existentes (ID de sistema => [ID de módulos])
        $relations = modules_system::select('systems', 'modules')->get()->groupBy('systems');

        return view('catalogos', compact('systems', 'modules', 'relations'));
    }
    public function store(Request $request)
    {

        $sysmod = new modules_system();
        $sysmod->id_systems = $request->system;
        $sysmod->id_modules = $request->module;
        $sysmod->save();
        return redirect()->route('catalogos')->with('success', 'Relación creada correctamente.');
    }
}
