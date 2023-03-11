<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'first_name' => ['required','string','min:5'],
            'last_name' => ['required','string','min:5'],
            'age' => ['required','integer','min:16','max:99'],
            'gender' => ['required','integer'],
            'phone' => ['required','numeric','digits:12'],
            'email'=>['required','email'],
        ];
    }
}
