<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'observation' => 'max:500',
            'name' => 'required|max:50',
            'zip_code' => 'required|max:9|min:9',
            'public_place' => 'required|max:50',
            'number' => 'digits_between:0,6',
            'state' => 'required|max:2',
            'city' => 'required|max:50',
            'phone_number' => 'required|max:20',
            'country' => 'required|max:75',
            'complement' => 'max:50',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo deve ser preenchido',
            'min' => 'Campo deve ter no mínimo :min caracteres',
            'max' => 'Campo deve ter no máximo :max caracteres',
            'integer' => 'Campo deve conter apenas números inteiros',
            'digits_between' => 'Campo deve ter no máximo 6 dígitos',
        ];
    }
}
