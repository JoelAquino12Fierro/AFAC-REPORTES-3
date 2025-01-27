<?php

namespace App\Livewire;

use Livewire\Component;

class EditUserModal extends Component
{
    public $open = false; // Variable para controlar el estado del modal

    public function render()
    {
        return view('livewire.edit-user-modal');
    }
}
