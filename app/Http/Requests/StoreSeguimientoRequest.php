<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeguimientoRequest extends FormRequest
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
            'contacto_id' => 'required',
            'curso_id' => 'required',
            'user_id' => 'required',
            'empleado_id' => 'required',
            'comentario' => 'required',
            'estado' => 'required',
        ];;


        return $rules;
    }
}
