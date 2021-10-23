<?php

namespace App\Http\Requests\Kalendarz;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKalendarzRequest extends FormRequest
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
                'required','alpha','max:50','min:3'
            ],
            'Opis'=> [
                'required','alpha','max:50','min:3'
            ],
            'Data'=> [
                'required','date'
            ],
            
        ];
    }
}
