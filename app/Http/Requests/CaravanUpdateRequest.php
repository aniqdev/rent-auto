<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaravanUpdateRequest extends FormRequest
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
            'caravan_category_id' => 'required|numeric',
            /* 'subtitle' => 'required|max:255',
            'charasteristics' => 'required|max:255',
            'short_description' => 'required',
            'description' => 'required',
            'video' => '',
            'spz' => 'required',
            'key_benefits' => 'required',
            'living_comfort' => 'required',
            'driving_comfort' => 'required',
            'equipment' => 'required',
            'operating_costs' => 'required',
            'floor_plan' => '',
            'seo_title' => 'required',
            'seo_keywords' => 'required',
            'seo_description' => 'required',
            'active' => 'required', */

            'tab' => 'required|array',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute je nutné vyplnit.',
        ];
    }
}
