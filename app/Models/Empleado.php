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

    public static function listArea()
    {
        $areas = Area::select('id', 'nombre')->get();

        return $areas;
    }

    public static function listRoles()
    {
      
        $roles = Rol::select('id', 'nombre')->get();

        return $roles;
    }
    
    public function areas(){

    	return $this->belongsTo(Area::class, 'area_id', 'id');

    }

    public function roles()
    {
        return $this->belongsToMany(Rol::class);
    }

}
