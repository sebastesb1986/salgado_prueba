<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmployeeRepository {
    
    // Model Empleado
    public function empleado()
    {
        return new Empleado();
    }

    //Lista Empleados
    public function listEmployees()
    {
        $employees = Empleado::with(['areas' => function($td){
            $td->select('id', 'nombre');
        }])
        ->select('id', 'nombre', 'email', 'sexo', 'boletin', 'descripcion', 'area_id');

        return $employees;
        
    }

    // Crear Empleado
    public function newEmpleado($nombre, $email, $sexo, $area_id, $boletin, $descripcion )
    {
        $empleado = $this->empleado();

        $data = [

            'nombre' => $nombre,
            'email' => $email,
            'sexo' => $sexo,
            'area_id' => $area_id,
            'boletin' => $boletin,
            'descripcion' => $descripcion,

        ];

        $employee = $empleado->create($data);

        return $employee;
    }

    // Editar Empleado
    public  function  editEmployee()
    {
        $employee = $this->empleado()::with(['areas' => function($td){
            $td->select('id', 'nombre');
        }])
        ->select('id', 'nombre', 'email', 'sexo', 'boletin', 'descripcion', 'area_id');

        return $employee;
    }

       // Actualizar Empleado
       /* public function updateEmpleado($nombre, $email, $sexo, $area_id, $boletin, $descripcion )
       {
           $empleado = $this->empleado();
   
           $data = [
   
               'nombre' => $nombre,
               'email' => $email,
               'sexo' => $sexo,
               'area_id' => $area_id,
               'boletin' => $boletin,
               'descripcion' => $descripcion,
   
           ];
   
           $employee = $empleado->create($data);
   
           return $employee;
       } */

    


}