<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class modules_system extends Model
{
    protected $table = 'modules_systems';
    protected $fillable = ['systems','modules'];

    public function system() //Funcionando
    {
        return $this->hasOne(System::class,'id','systems');
    }
    // 'foreign_key', 'local_key'
    public function module() //Funcionando
    {
        return $this->hasOne(Module::class,'id','modules');
    }
}
