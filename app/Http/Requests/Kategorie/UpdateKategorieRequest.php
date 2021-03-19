<?php

namespace App\Http\Requests\Kategorie;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKategorieRequest extends FormRequest
{
    /**
     * Reguły walidacji
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Nazwa'=> [
                'required','max:50','min:3'
            ],
            'Opis'=> [
                'required','max:150','min:10'
            ],
        ];
    }
}
