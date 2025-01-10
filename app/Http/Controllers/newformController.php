<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newformController extends Controller
{
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
