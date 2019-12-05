<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file_archivo' => 'nullable|max:10240 '
        ];
    }
    public function messages()
    {
        return[
            'file_archivo,max' => 'El archivo no puede ser superior a 10MB'
        ];
    }
}
