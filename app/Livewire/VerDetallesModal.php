<?php

namespace App\Livewire;

use Livewire\Component;

class VerDetallesModal extends Component
{
    public $detalles = true;
    public function render()
    {
        return view('livewire.ver-detalles-modal');
    }
}
