<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewProductRequest extends FormRequest
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
            'nome_e_codice' => ['required','max:100','string'],
            'descrizione' => ['required','max:3000','string'],
            'note_buon_uso' => ['required','max:3000','string'],
            'modi_installazione' => ['required','max:3000','string'],
            'image_catalogo' => ['image']
        ];
    }
}
