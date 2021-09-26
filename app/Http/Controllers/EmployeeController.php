<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormEmployeeRequest;
use App\Models\Area;
use App\Models\Empleado;
use App\Models\Rol;

class EmployeeController extends Controller
{
    public function index()
    {

        $employees = Empleado::with(['areas' => function($td){
                                $td->select('id', 'nombre');
                            }])
                            ->select('id', 'nombre', 'email', 'sexo', 'boletin', 'descripcion', 'area_id')
                            ->get();

        return view('lista.index', compact('employees'));

    }

    public function create()
    {
        
        return view('lista.create');

    }

    public function modificar($id)
    {

        $employee = Empleado::with(['areas' => function($td){
                                $td->select('id', 'nombre');
                            }])
                            ->select('id', 'nombre', 'email', 'sexo', 'boletin', 'descripcion', 'area_id')
                            ->findOrFail($id);
       
        return view('lista.edit', compact('employee'));

    }

    public function store(FormEmployeeRequest $request)
    {
        $data = [

            'nombre' => $request->nombre,
            'email' => $request->email,
            'sexo' => $request->customRadio,
            'area_id' => $request->area,
            'boletin' => ( $request->has('boletin') == true ? '1' : '0'),
            'descripcion' => $request->descripcion,


        ];

        $employee = Empleado::create($data);

        $employee->roles()->sync($request->roles);

        return redirect()->route('lista')->with('success', 'Empleado <strong> ' .$request->nombre. ' </strong> Registrado exitosamente!');
    }

    public function update(FormEmployeeRequest $request, $id)
    {
        $employee = Empleado::findOrFail($id);

        $data = [

            'nombre' => $request->nombre,
            'email' => $request->email,
            'sexo' => $request->customRadio,
            'area_id' => $request->area,
            'boletin' => ( $request->has('boletin') == true ? '1' : '0'),
            'descripcion' => $request->descripcion,

        ];

        $employeeUp = $employee->update($data);

        $employee->roles()->sync($request->roles);

        return redirect()->route('lista')->with('success', 'Empleado <strong> ' .$request->nombre. ' </strong> Modificado exitosamente!');
    }

    public function delete(Request $request, $id)
    {
        $employee = Empleado::findOrFail($id);
        $employee->delete();

    }

}
