<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponStoreRequest extends FormRequest
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
            'name' => 'required|max:255|without_spaces',
            'type' => 'required',
            'discount' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Název kupónu je nutné vyplnit.',
            'type.required' => 'Je nutné zvolit druh kupónu.',
            'discount.required' => 'Hodnotu kupónu je nutné vyplnit.',
            'without_spaces' => 'Název kupónu nesmí obsahovat mezeru.',
        ];
    }
}
