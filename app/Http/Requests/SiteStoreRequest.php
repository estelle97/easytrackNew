<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteStoreRequest extends FormRequest
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
            'name' => 'required|unique:sites',
            'email' => 'email|required',
            'phone1' => 'required|min:200000000|max:999999999|numeric|unique:sites',
            'phone2' => 'required|min:200000000|max:999999999|numeric|unique:sites',
            'town' => 'required',
            'street' => 'required'
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Ce champ est obligatoire',
            'phone1.*' => "Format de téléphone incorrect",
            'phone2.*' => "Format de téléphone incorrect",
            'email' => "Adresse email invalide",
            'name.unique' => 'Ce site existe déja',
        ];
    }
}
