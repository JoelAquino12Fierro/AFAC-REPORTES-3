<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\System;
use App\Models\types_report;
use App\Models\User;
use Illuminate\Http\Request;

class newformController extends Controller
{
    public function create_function(){
        $area=Area::all();
        $system=System::all();
        $type=types_report::all();
        $user=User::all();
        return view('newForm', compact('area','system','type','user')); 
    }
    
    
    // CONTROLADOR DE EL FORMULARIO QUE CREA REPORTES NUEVOS 


    public function store(Request $request){

        $request->validate([
            'application_date'=>'required|date',
            'report_date'=>'required|date',
            'area'=>'required|string',
            'system'=>'required|string',
            'type_report'=>'required|string',
            'reporting_user'=>'required|exists:users,id',
            'actions'=>'require|string',
            'description'=>'nullable|string',
            'evidence'=>'nullable|image|mimes:jpg,png|max:2048',
        ]);

        //generar folio con nomeclatura
    }
}
