<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BRIEF extends Model
{
    use HasFactory;
    
    public $table='TABLE_BRIEF';
    
    protected $primaryKey='Brief';
    
    protected  $fillable = [
        'Solicitante',
        'Solicitante_name',
        'VigIni',
        'VigFin',
        'VigPag',
        'VigLiq',
        'ObjGen',
        'ObjEsp',
        'Cond',
        'ForPagVe',
        'ForPagLab',
        'Pres',
        'Conclucion',
        'State',
    ];
    public $timestamps = false;
}
