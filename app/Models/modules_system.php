<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class modules_system extends Model
{
    protected $fillable = ['id_systems','id_modules'];

    public function system() //Funcionando
    {
        return $this->hasOne(System::class,'id','id_systems');
    }
    public function module() //Funcionando
    {
        return $this->hasOne(Module::class,'id','id_modules');
    }
}
