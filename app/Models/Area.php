<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = "areas";
    protected $fillable = [
        'nombre'
    ];

    public $timestamps = false;
    
    public function employee(){

    	return $this->hasMany(Empleado::class, 'id', 'area_id');

    }
}
