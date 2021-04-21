<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->empleado_id_logged == auth()->user()->empleado->id ) {
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
        if ($this->asignar == 'true') {
            $rules = [
                'empleado_id_logged' => 'required',
                'empleado_id' => 'required',
            ];

        } else {

            $rules = [
                'nombres' => 'required',
                'telefono' => 'required',
                'estado' => 'required|in:1,2,3,4,5',
            ];

            if ($this->grado_academico) {
                $rules = array_merge($rules, [
                    'grado_academico' => 'required|in:1,2,3,4',
                ]);
            }

            if ($this->email) {
                $rules = array_merge($rules, [
                    'email' => 'email',
                ]);   
            }

        }

        return $rules;
    }
}
