<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    protected $table = 'reports';
    // Para imprimir los nombres de la relaciones
    protected $fillable = ['id', 'systems', 'areas', 'types_reports', 'reporting_user', 'modules_systems', 'status', 'responsibles'];

    public function system() //Funcionando
    {
        return $this->hasOne(System::class, 'id', 'systems');
    }

    public function area() //Funcionando
    {
        return $this->hasOne(Area::class, 'id', 'areas');
    }
    public function type()
    {
        return $this->hasOne(types_report::class, 'id', 'types_reports');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'reporting_user');
    }
    public function modules_systems()
    {
        return $this->hasOne(modules_system::class, 'id', 'modules_systems');
    }
    public function responsibles()
    {
        return $this->hasOne(responsible::class, 'id', 'responsibles');
    }
}
