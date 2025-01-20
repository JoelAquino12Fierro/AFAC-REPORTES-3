<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    // Para imprimir en la tabla
    // use HasFactory;

    // protected $fillable = ['systems', 'areas'];

    public function system()
    {
        return $this->hasOne(System::class, 'id', 'report_id');
    }

    public function area()
    {
        return $this->hasOne(Area::class);
    }
}
