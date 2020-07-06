<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
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
            'name' => 'bail|required|max:255',
            'tel' => 'required',
            'email' => 'bail|email|required',
            'password' => 'bail|required',
            'name_snack' => 'bail|required',
            'town_snack' => 'bail|required',
            'town_site' => 'bail|required',
            'license' => 'bail|required',
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
            'name.required' => 'un nom est requis',
            'name.max' => 'Ce nom est très long',
            'address.required' => 'Une adresse est requise',
            'address.max' => 'Cette adresse est très longue',
            'tel.required' => 'Un numéro de téléphone est requis',
            'email.required' => 'Une adresse mail est requise',
            'password.required' => 'Un mot de passe est requis',
            'name_snack.required' => 'Un nom de snack est requis',
            'town_snack.required' => 'Une ville de snack est requise',
            'town_site.required' => 'Une ville de site est requise',
            'license.required' => 'Le choix d\'un forfait est requis',
        ];
    }
}
