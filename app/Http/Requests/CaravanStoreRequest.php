<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaravanStoreRequest extends FormRequest
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
            'name' => 'required',
            'caravan_category_id' => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute je nutné vyplnit.',
        ];
    }
}
