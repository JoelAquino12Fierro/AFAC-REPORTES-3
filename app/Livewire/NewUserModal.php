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
    public $confirmOpen =false;

    public function showConfirmationModal()
{
    $this->confirmOpen = true;
}
   public function createUser()
{
    // Aquí guardas los datos en la base de datos
    $this->confirmOpen = false; // Cierra el modal de confirmación
    $this->open = false; // Cierra el modal principal
    session()->flash('message', 'Usuario creado exitosamente.');
}
    //función para los roles
    // public function create_function(){
    //     $datas=Role::all();
    //     return view('livewire.new-user-modal',compact('datas'));
    // }
    
}
