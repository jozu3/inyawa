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
        if ($this->user_id == auth()->user()->id ) {
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
                'user_id' => 'required',
                'empleado_id' => 'required',
            ];

        } else {

            $rules = [
                'nombres' => 'required',
                'telefono' => 'required',
                //'email' => ['required', 'email'],
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
