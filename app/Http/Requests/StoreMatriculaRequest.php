<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatriculaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->empleado_id == auth()->user()->empleado->id ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
                'nombres' => 'required',
                'apellidos' => 'required',
                'telefono' => 'required',
                'doc' => 'required',
                'grado_academico' => 'required',
                'email' => ['required', 'email'],
                'estado' => 'required|in:1,2,3,4,5',
                'tipomatricula' => 'required',
                'curso_id' => 'required',
                'grupo_id' => 'required',
                'empleado_id' => 'required',
                'fecha' => ['required', 'date'],
            ];

        return $rules;
    }
}
