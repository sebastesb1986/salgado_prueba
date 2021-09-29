<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormEmployeeRequest;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{
    protected $employeeRepository;

    // Llamar Funciones del Repositorio
    public function __construct(EmployeeRepository $employeeRepository){

        $this->employeeRepository = $employeeRepository;

    }

    public function index()
    {
        $employees = $this->employeeRepository->listEmployees()->get();

        return view('lista.index', compact('employees'));

    }

    public function create()
    {
        
        return view('lista.create');

    }

    public function modificar($id)
    {

        $employee = $this->employeeRepository->editEmployee()->findOrFail($id);
       
        return view('lista.edit', compact('employee'));

    }

    public function store(FormEmployeeRequest $request)
    {
        
        $employee = $this->employeeRepository->newEmpleado(
            
            $request->nombre,
            $request->email,
            $request->customRadio,
            $request->area,
            ( $request->has('boletin') == true ? '1' : '0'),
            $request->descripcion,

        );

        $employee->roles()->sync($request->roles);

        return redirect()->route('lista')->with('success', 'El empleado <strong> ' .$request->nombre. ' </strong> Ha sido registrado exitosamente!');
    }

    public function update(FormEmployeeRequest $request, $id)
    {
        $employee = $this->employeeRepository->empleado()->findOrFail($id);

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

        return redirect()->route('lista')->with('success', 'El empleado <strong> ' .$request->nombre. ' </strong> ha sido modificado exitosamente!');
    }

    public function delete(Request $request, $id)
    {
        $employee = $this->employeeRepository->empleado()->findOrFail($id);
        $employee->delete();

        if($request->ajax())
        {
            return response()->json(['success'=> 'El empleado <strong> ' .$employee->nombre. ' </strong> ha sido eliminado.']);
        }

    }

}
