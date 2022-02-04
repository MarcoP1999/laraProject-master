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
            'username' => 'required|max:25|unique:users',
            'password' => 'required|min:8',
            'nome' => 'required',
            'cognome'=> 'required',
            'email' => 'required',
            'n_tel' => 'max:10',

        ];
    }
}
