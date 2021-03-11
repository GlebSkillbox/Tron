<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RegisterRequest extends FormRequest
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
            'login'    => ['required', 'string', 'unique:users', 'max:40'],
            'email'    => ['required', 'string', 'email:filter', 'unique:users', 'max:40'],
            'password' => ['required', 'string', 'min:4'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'password' => \Hash::make($this->password),
            'remember_token' => Str::random(10),
        ]);
    }
}
