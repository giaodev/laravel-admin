<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTagRequest extends FormRequest
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
            'tag_name' => ['required', Rule::unique('tag')->ignore($this->segment(4), 'id')]
            'tag_slug' => [Rule::unique('tag')->ignore($this->segment(4), 'id')],
        ];
    }
}
