<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest {

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
            'domanda' => ['required','max:3000', 'string'],
            'risposta' => ['required','max:3000', 'string'],
            ];
    }
}

