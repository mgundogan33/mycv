<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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

    public function rules()
    {
        return [
            'title' => 'required|min::2:max:255',
            'tags' => 'required|min::2:max:255',
            'images.*' => 'mimes:png,jpg,jpeg|size:2048'

        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Başlık alanı boş bırakılamaz',
            'title.min' => 'Başlık alanı minimum 2 karakterden oluşmalıdır',
            'title.max' => 'Başlık alanı maksimum 255 karakterden oluşabilir',
            'tags.required' => 'Etiket alanı boş bırakılamaz',
            'tags.min' => 'Etiket alanı minimum 2 karakterden oluşmalıdır',
            'tags.max' => 'Etiket alanı maksimum 255 karakterden oluşabilir',
            'images.*.mimes' => 'Resimler png,jpg,jpeg olabilir',
            'images.*.size' => 'Resimler maksimum 2MB olabilir',
        ];
    }
}
