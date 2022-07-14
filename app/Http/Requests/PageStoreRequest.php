<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'text' => 'required',
            'seo_title' => 'required',
            'seo_keywords' => 'required',
            'seo_description' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Název stránky je nutné vyplnit.',
            'text.required' => 'Text stránky je nutné vyplnit.',
            'seo_title.required' => 'SEO titulek je nutné vyplnit.',
            'seo_keywords.required' => 'SEO klíčové slová je nutné vyplnit.',
            'seo_description.required' => 'SEO popis je nutné vyplnit.',
        ];
    }
}
