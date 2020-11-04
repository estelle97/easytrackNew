<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|regex:^[A-Z a-z]+[0-9]{0,3}',
            'phone' => 'required|min:200000000|max:999999999|numeric',
            'email' => 'email|nullable',
            'username' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            'address' => 'required',
            'role_id' => 'required',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
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
            'phone.*' => "Format de téléphone incorrect",
            'email' => 'Adresse email invalide',
            'password.min' => "Le mot de passe doit avoir au moins 8 caracètres",
            'photo.*' => "Format de photo incorrect",
            'username.unique' => "Ce nom d'utilisateur n'est plus disponible",
            'username.*' => "Nom d'utilisateur incorrect",
        ];
    }
}
