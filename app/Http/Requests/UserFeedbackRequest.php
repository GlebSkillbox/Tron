<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $idUserFeedback = $this->route('feedback')->id ?? null;

        if ($idUserFeedback === null) {
            $this->merge([
                'created_by' => $this->user()->id,
            ]);
        }
    }

    public function rules()
    {
        return [
            'title'   => ['required', 'string', 'max:250'],
            'body'    => ['required', 'string', 'max:1000'],
            'user_id' => ['required', 'integer'],
        ];
    }
}
