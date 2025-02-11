<?php

namespace App\Livewire;

use Livewire\Component;

class VerDetallesModal extends Component
{
    public $detalles = false;
    public $confirmSaveReport =false;
    public function render()
    {
        return view('livewire.ver-detalles-modal');
    }

    public function confirmar(){
        $this->detalles = false;
        $this->confirmSaveReport = true;
    }

    public function backFirstModal(){
        $this->detalles = true;
        $this->confirmSaveReport = false;
    }

    // //funcion que llama a otra función 
    // public function update(){

    // }
}
