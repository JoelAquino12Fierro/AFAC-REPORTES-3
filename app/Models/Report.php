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

    public function system(): HasMany
    {
        return $this->hasMany(System::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
