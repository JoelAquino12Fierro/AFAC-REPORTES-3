<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class responsible extends Model
{
    protected $table = 'responsibles';
    // Para imprimir los nombres de la relaciones
    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'users', 'id');
    }

    // Relación con el área (si quieres obtener el nombre del área desde esta tabla)
    public function area()
    {
        return $this->belongsTo(Area::class, 'areas', 'id');
    }

    // Relación con el cargo (posición)
    public function position()
    {
        return $this->belongsTo(Position::class, 'positions', 'id');
    }
}
