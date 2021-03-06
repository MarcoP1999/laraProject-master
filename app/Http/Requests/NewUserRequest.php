<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewUserRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non metto restrizioni d'uso su base utente
        // Gestisco l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'username' => 'required|max:25|unique:users|string',
            'password' => ['nullable','min:8', 'required_with:password_confirm', 'same:password_confirm'],
            'name' => 'required|string',
            'surname'=> 'required|string',
            'email' => 'required',
            'n_tel' => 'numeric',
            'piva' => ['required'],

        ];
    }
}
