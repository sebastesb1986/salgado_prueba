<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'nombre' => 'Nombre',
            'email' => 'Correo electrónico',
            'customRadio' => 'Sexo',
            'area' => 'Area', 
            'descripcion' => 'Descripción',
            'roles' => 'Rol',       
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    
        $id = ( ($this->getMethod() === 'PUT') ? $this->id : null);

        return [

            'nombre' => 'required',
            'email' => 'required|unique:empleado,email, ' .$id,
            'customRadio' => 'required',
            'area' => 'required', 
            'descripcion' => 'required',
            'roles' => 'required',  

        ];
    }
}
