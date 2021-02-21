<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
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
        $idNews = $this->route('news')->id ?? null;

        return [
            'title'   => [
                'required',
                'string',
                'max:255',
                isset($idNews) ? Rule::unique('news')->ignore($idNews) : 'unique:news,title',
            ],
            'content' => ['required', 'string'],
            'date'    => ['required', 'date'],
        ];
    }

    protected function prepareForValidation()
    {
        $idNews = $this->route('news')->id ?? null;

        if (! isset($idNews)) {
            $this->merge([
                'created_by' => $this->user()->id,
            ]);
        }
    }
}
