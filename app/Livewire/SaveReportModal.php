<?php

namespace App\Livewire;

use Livewire\Component;

class SaveReportModal extends Component
{
    public $confirmReport = false;
    public $reportName = false;

    public function render()
    {
        return view('livewire.save-report-modal');
    }
}
