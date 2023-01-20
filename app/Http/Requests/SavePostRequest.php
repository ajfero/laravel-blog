<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Verifica si la peticion del usuario esta autorizado
     * @return bool
     */
    public function authorize()
    {
        // si el usuario es admin
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // conditions validations
        // if ($this->isMethod('PATCH')) {
        //     # code...
        //     return [
        //         'title'=>['required','min:8'],
        //         'body'=>['required'],
        //     ];
        // }

        // validations rules
        return [
            //  
            'title' => ['required', 'min:4'],
            'body' => ['required'],
        ];
    }
}
