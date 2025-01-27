<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;

class NewUserModal extends Component
{
    public function render()
    {
        return view('livewire.new-user-modal');
    }

    public $open = false; // Variable para controlar el estado del modal

    //función para los roles
    // public function create_function(){
    //     $datas=Role::all();
    //     return view('livewire.new-user-modal',compact('datas'));
    // }
    
}
