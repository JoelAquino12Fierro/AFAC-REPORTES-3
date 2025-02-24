<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{


    protected $fillable = [
        'folio',
        'application_date',
        'areas',
        'systems',
        'types_reports',
        'report_user',
        'description',
        'evidence',
        'report_date',
        'modules',
        'descriptionA',
        'evidenceA',
        'responsibles',
        'status',
    ];
    // protected $casts = [
    //     'application_date' => 'datetime',
    //     'report_date' => 'datetime',
    // ];

    // Relación con la tabla areas
    public function area()
    {
        // belongsTo(ClaseDelModeloRelacion, 'nombre_columna_FK', 'columna_PK_de_la_tabla_relacionada')
        return $this->belongsTo(Area::class, 'areas', 'id');
    }

    // systems
    public function system()
    {
        return $this->belongsTo(System::class, 'systems', 'id');
    }

    // types_reports
    public function typeReport()
    {
        return $this->belongsTo(types_report::class, 'types_reports', 'id');
    }
// Modules
    public function module()
    {
        return $this->belongsTo(Module::class, 'modules', 'id');
    }

    // responsibles
    public function responsible()
    {
        return $this->hasMany(Responsible::class, 'areas', 'responsibles');
    }

    
}
