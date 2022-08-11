<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_breif extends Model
{
    use HasFactory;
    
    public $table = 'detalle_brief';

    protected $primaryKey = 'id';

    public $fillable = ['Titulo', 'Brief_id', 'vendedor_id', 'Meta', 'Ganancia',]; 
    
    public $timestamps = false;

}
