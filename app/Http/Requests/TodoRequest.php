<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required','min:10'],
            'user_id' => ['required', 'numeric'],
            'description' => [],
            'status' => [],
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Title Cannot be Empty..",
            "title.min" => "Minimum Length is 10 characters",
            "user_id.required" => "Must Be Authed User",
        ];
    }
}
