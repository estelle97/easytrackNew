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
            'username' => 'sometimes|required',
            'useraddress' => 'sometimes|required',
            'userphone' => 'sometimes|required|min:200000000|max:999999999|numeric|unique:users,phone',
            'useremail' => 'sometimes|required|email|unique:users,email',
            'userusername' => 'sometimes|required|unique:users,username|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'userpassword' => 'sometimes|required|min:8',

            'companyname' => 'sometimes|required|unique:companies,name',
            'companyphone1' => 'sometimes|required|min:200000000|max:999999999|numeric|unique:companies,phone1',
            'companyphone2' => 'sometimes|min:200000000|max:999999999|numeric|unique:companies,phone2',
            'companyemail' => 'sometimes|required|email|unique:companies,email',

            'sitename' => 'sometimes|required|unique:sites,name',
            'sitephone1' => 'sometimes|required|min:200000000|max:999999999|numeric|unique:sites,phone1',
            'sitephone2' => 'sometimes|min:200000000|max:999999999|numeric|unique:sites,phone2',
            'siteemail' => 'sometimes|required|email|unique:sites,email',
            'sitestreet' => 'sometimes|required',
            'sitetown' => 'sometimes|required'
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
            'email' => 'Adresse email invalide',
            'userphone.unique' => 'Numéro de téléphone déja utilisé',
            'userphone.*' => "Format de téléphone incorrect",
            'userusername.unique' => "Nom d'utilisateur déja utilisé",
            'userusername.*' => "Nom d'utilisateur incorrect",
            'useremail' => "Adresse email déja utilisée",
            'userpassword.min' => "Mot de passe trop court (Au moins 8 caractères)",

            'companyname.unique' => "Nom de companie déja utilisé",
            'companyphone1.unique' => "Numéro de téléphone déja utilisé",
            'companyphone2.unique' => "Numéro de téléphone déja utilisé",
            'companyphone1.*' => "Format de téléphone incorrect",
            'companyphone2.*' => "Format de téléphone incorrect",
            'companyemail.unique' => "Adresse email déja utilisée", 

            'sitename.unique' => "Nom de companie déja utilisé",
            'sitephone1.unique' => "Numéro de téléphone déja utilisé",
            'sitephone2.unique' => "Numéro de téléphone déja utilisé",
            'sitephone1.*' => "Format de téléphone incorrect",
            'sitephone2.*' => "Format de téléphone incorrect", 
        ];
    }
}
