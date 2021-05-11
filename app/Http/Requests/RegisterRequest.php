<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required','same:password']
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Name Is Required',
        ];
    }
}
