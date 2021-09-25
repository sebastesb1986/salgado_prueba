<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = "empleado";
    protected $fillable = [
        'nombre', 'email', 'sexo', 'boletin', 'descripcion', 'area_id'
    ];

    public $timestamps = false;
    
    public function areas(){

    	return $this->belongsTo(Area::class, 'area_id', 'id');

    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class);
    }

}
