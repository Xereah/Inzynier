<?php

namespace App\Http\Requests\Gospodarstwo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGospodarstwoRequest extends FormRequest
{
    /**
     * Reguły walidacji
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Imie_Wlasciciel'=> [
                'required','max:50','min:3'
            ],
            'Nazwisko_Wlasciciel'=> [
                'required','max:50','min:3'
            ],
            'Miejscowosc'=> [
                'required','max:50','min:3'
            ],
            'Kod_Pocztowy'=> [
                'required',
            ],
            'Poczta_Miejscowosc'=> [
                'required','max:50','min:3'
            ],
            'Telefon'=> [
                'required','numeric'
            ],
            'Email'=> [
                'required','Email:rfc,dns'
            ],
        ];
    }
}
