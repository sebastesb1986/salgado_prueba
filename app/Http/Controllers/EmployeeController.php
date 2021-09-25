<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $areas = Area::select('id', 'nombre')->get();

        $roles = Rol::select('id', 'nombre')->get();

        return view('lista.create', compact('areas', 'roles'));

    }

    public function modificar($id)
    {

        $areas = Area::select('id', 'nombre')->get();

        $roles = Rol::select('id', 'nombre')->get();

        $employee = Empleado::with(['areas' => function($td){
                                $td->select('id', 'nombre');
                            }])
                            ->select('id', 'nombre', 'email', 'sexo', 'boletin', 'descripcion', 'area_id')
                            ->findOrFail($id);
       
        return view('lista.edit', compact('employee', 'areas', 'roles'));

    }

    public function store(Request $request)
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

        return redirect()->route('lista');
    }

    public function update(Request $request, $id)
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

        $employeeUp = Empleado::update($data);

        $employee->roles()->sync($request->roles);
    }

    public function delete(Request $request, $id)
    {
        $employee = Empleado::findOrFail($id);
        $employee->delete();

    }

}