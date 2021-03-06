<?php

namespace App\Http\Requests\StoreRequests;

use Illuminate\Foundation\Http\FormRequest;

class storeClient extends FormRequest
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
           'username'=>'string|max:50|unique:users',
           'password'=>'string|max:50'
        ];
    }
}
