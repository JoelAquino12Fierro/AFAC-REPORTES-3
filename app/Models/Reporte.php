<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reporte extends Model
{
    //
    use HasFactory;

    protected $table = 'reporte';

    public static function getRecentReports(){
        return
        self::orderBy('created_at', 'desc')->get();
    }

    public function user(){
        return
        $this->belongsTo(User::class,'reporting_user');
    }
}
