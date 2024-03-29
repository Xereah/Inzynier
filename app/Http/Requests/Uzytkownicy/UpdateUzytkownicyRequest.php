<?php

namespace App\Http\Requests\Uzytkownicy;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUzytkownicyRequest extends FormRequest
{
    /**
     * Reguły walidacji
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> [
                'required','max:50','min:3',
            ],
            'surname'=> [
                'required','max:50','min:3',
            ],
            'adress'=> [
                'required','max:50','min:3'
            ],
            'email'=> [
                'required','email:rfc,dns','unique:users'
            ],
            'phone'=> [
                'required','digits:9','numeric',
            ],
            'password'=> [
                'required','min:8'
            ],
        ];
    }
}
