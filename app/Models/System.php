<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class System extends Model
// {
//     use HasFactory;
//     protected $table = 'systems';
//     protected $fillable = ['id','systems_name'];
// }

class System extends Model
{
    use HasFactory;

    protected $table = 'systems'; // Nombre de la tabla en la base de datos
    protected $fillable = ['id','systems_name'];
}


