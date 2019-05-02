<?php

namespace App\Http\Requests\updateRequest;

use Illuminate\Foundation\Http\FormRequest;

class updateClient extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom'=>'string|max:40',
           'telephone'=>'numeric',
           'adresse'=>'string|max:25',
           'email'=>'email|max:30',
           'type_client'=>'string|size:2',
        ];
    }
}
