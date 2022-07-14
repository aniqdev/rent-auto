<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users',
            'phone' => 'required|max:255',
            'birthdate' => 'required|date',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'zip' => 'required|regex:/\b\d{5}\b/',
            'discount' => 'numeric|max:255',
            'company' => 'max:255',
            'ico' => 'max:255',
            'dic' => 'max:255',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Jméno je nutné vyplnit.',
            'last_name.required' => 'Příjmení je nutné vyplnit.',
            'email.required' => 'E-mail je nutné vyplnit.',
            'email.unique' => 'Uživatel s timto e-mailem již existuje.',
            'email.email' => 'E-mailová adresa musí být validní.',
            'phone.required' => 'Telefón je nutné vyplnit.',
            'address.required' => 'Adresu je nutné vyplnit.',
            'city.required' => 'Město je nutné vyplnit.',
            'zip.required' => 'PSČ je nutné vyplnit.',
            'zip.regex' => 'PSČ je nutné vyplnit ve tvaru XXXXX.',
            'discount.numeric' => 'Sleva musí být v celočíselném formátu.',
            'password.required' => 'Heslo je nutné vyplnit.',
            'password.confirmed' => 'Heslo a potvrzení hesla se nezhodují.',
            'role.required' => 'Je nutné uživateli vybrat jeho roli / práva.',
        ];
    }
}
