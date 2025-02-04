<?php

namespace App\Livewire;

use Livewire\Component;

class ConfirmationModal extends Component
{
    public $confirmOpen = false;
    public function render()
    {
        return view('livewire.confirmation-modal');
    }
}
