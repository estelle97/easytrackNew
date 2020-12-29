<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required',
            'photo' => 'sometimes|image|mimes:png|max:1024'
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
            'name.required' => 'Ce champ est obligatoire',
            'name.unique' => "Ce produit existe déja",
            'photo.required' => 'Ajoutez une photo à votre produit',
            'photo.image' => "Votre photo est sur un format incorrect",
            'photo.max' => 'La photo du produit doit peser moins de 1Mo',
            'photo.mime' => 'Le format de photo accepté est le PNG',
        ];
    }
}
