<?php

namespace App\Livewire;

use Livewire\Component;

class ConfirmDeleteModal extends Component
{
    public $item = false;
    public function render()
    {
        return view('livewire.confirm-delete-modal');
    }
}
