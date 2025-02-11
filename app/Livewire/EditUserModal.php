<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;

class EditUserModal extends Component
{
    public $open = false; // Variable para controlar el estado del modal
    public $confirmEdit = false; //variable para el mensaje de confirmación de guardar editar usuario 

    public function render()
    {
        return view('livewire.edit-user-modal');
    }

    public function hideEditModal(){
        $this->open = false;
        $this->confirmEdit =true;
    }

    public $folio, $application_date, $report_date, $area, $system, $type, $report_user;

    protected $rules = [
        'folio' => 'required|unique:reportes,folio',
        'application_date' => 'required|date',
        'report_date' => 'required|date',
        'area' => 'required',
        'system' => 'required',
        'type' => 'required',
        'report_user' => 'required',
    ];

    public function save()
    {
        $this->validate();

        Report::create([
            'folio' => $this->folio,
            'application_date' => $this->application_date,
            'report_date' => $this->report_date,
            'area' => $this->area,
            'system' => $this->system,
            'type' => $this->type,
            'report_user' => $this->report_user,
        ]);

        session()->flash('message', 'Reporte guardado correctamente.');

        $this->reset();
        $this->emit('reporteGuardado');
    }
}
