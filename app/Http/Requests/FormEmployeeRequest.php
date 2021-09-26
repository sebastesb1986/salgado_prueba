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

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre no puede ir vacio.',
            'email.required' => 'El campo email no puede ir vacio.',
            'customRadio.required' => 'El campo sexo no puede ir vacio.',
            'descripcion.required' => 'El campo descripción no puede ir vacio.',
            'area.required' => 'Seleccione al menos un area.',
            'roles.required' => 'Seleccione al menos un rol.',

            'email.email' => 'El campo email no tiene un formato valido.',
            'email.unique' => 'Este correo electrónico ya se encuentra registrado.',
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
            'email' => 'required|email|unique:empleado,email, ' .$id,
            'customRadio' => 'required',
            'area' => 'required', 
            'descripcion' => 'required',
            'roles' => 'required',  

        ];
    }
}
