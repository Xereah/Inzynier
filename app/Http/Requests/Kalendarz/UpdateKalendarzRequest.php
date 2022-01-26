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
                'required','max:50','min:3'
            ],
            'Opis'=> [
                'required','max:50','min:3'
            ],
            'Data'=> [
                'required','date'
            ],
            
        ];
    }
}
