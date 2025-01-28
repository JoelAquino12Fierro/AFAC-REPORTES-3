<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class responsible extends Model
{
    protected $table = 'resposibles';
    // Para imprimir los nombres de la relaciones
    protected $fillable = ['users','areas','positions'];

    public function users() //Funcionando
    {
        return $this->hasOne(User::class, 'id', 'users');
    }
    public function areas() //Funcionando
    {
        return $this->hasOne(positions_area::class, 'id', 'areas');
    }
    public function positions() //Funcionando
    {
        return $this->hasOne(positions_area::class, 'id', 'positions');
    }

}
