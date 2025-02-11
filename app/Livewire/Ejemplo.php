<?php

namespace App\Livewire;

use Livewire\Component;

class Ejemplo extends Component
{
        public $open = false;
    
        public function abrirModal()
        {
            $this->open = true;
        }
    
        public function cerrarModal()
        {
            $this->open = false;
        }
    
        public function render()
        {
            return view('livewire.ejemplo');
        }


}
