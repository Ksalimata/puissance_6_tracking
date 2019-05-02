<?php

namespace App\Http\Requests\StoreRequests;

use Illuminate\Foundation\Http\FormRequest;

class storeEmploye extends FormRequest
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
            'prenom'=>'string|max:50',
            'cni'=>'string|max:13',
            'contact'=>'numeric',
            'date_naissance'=>'max:10',
            'domicile'=>'string|max:20',
            'heure_debut'=>'max:6',
            'heure_fin'=>'max:6',
            'photo' => 'mimes:jpeg,bmp,png|max:60000',
            'empreinte'=>'mimes:jpeg,bmp,png|max:1000',
            'typePiece'=>''
        ];
    }
}
