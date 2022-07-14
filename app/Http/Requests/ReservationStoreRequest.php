<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'last_name' => 'required|max:255',
            'birthdate' => 'required|date',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'zip' => 'required|max:255',
            'payment_method' => 'required',
            'terms' => 'required',
        ];
    }
}
