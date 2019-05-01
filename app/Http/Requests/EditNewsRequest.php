<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EditNewsRequest extends FormRequest
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
            'news_title' => 'required',
            'news_slug' => ['required', Rule::unique('news','news_slug')->ignore($this->segment(4), 'id'), Rule::unique('product','product_slug')->ignore($this->segment(4), 'id'), Rule::unique('category','cate_slug')->ignore($this->segment(4), 'id')],
            'cate' => 'required',
        ];
    }
}
