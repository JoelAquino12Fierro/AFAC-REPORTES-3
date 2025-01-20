<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    
    // Para imprimir los nombres de la relaciones
    protected $fillable = ['systems', 'areas', 'types_reports','reporting_user'];

    public function system() //Funcionando
    {
        return $this->hasOne(System::class,'id','systems');
    }

    public function area() //Funcionando
    {
        return $this->hasOne(Area::class,'id','areas');

    }
    public function type()
    {
        return $this->hasOne(types_report::class,'id','types_reports');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','reporting_user');
    }
}
