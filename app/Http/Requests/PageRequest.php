<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
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
        $idPage = $this->route('page')->id ?? null;

        return [
            'title' => [
                'required',
                'string',
                'max:255',
                isset($idPage)
                    ? Rule::unique('pages')->ignore($idPage)
                    :'unique:pages,title',
            ],
            'body' => ['required', 'string', 'min:10'],
            'uri' => [
                'required',
                'string',
                'max:255',
                isset($idPage)
                    ? Rule::unique('pages')->ignore($idPage)
                    : 'unique:pages,uri',
            ],
        ];
    }

    protected function prepareForValidation()
    {
        $idPage = $this->route('page')->id ?? null;

        if(! isset($idPage)) {
            $this->merge([
                'owner_id' => $this->user()->id,
            ]);
        }
    }
}
