<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules'; // Nombre de la tabla en la base de datos
    protected $fillable = ['modules_name']; //Atributos
}
