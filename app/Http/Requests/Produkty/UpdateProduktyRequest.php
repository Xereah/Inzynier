<?php

namespace App\Http\Requests\Produkty;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduktyRequest extends FormRequest
{
    /**
     * Reguły walidacji
     *
     * @return array
     * 
     */
    
    
    public function rules()
    {
        return [
            'Nazwa'=> [
                'required','max:50','min:3',
            ],
            'Cena'=> [
                'required','numeric'
            ],
            'Ilosc'=> [
                'required','numeric'
            ],
            'JednostkaMiary'=> [
                'required',
            ],
            'fk_kategorie'=> [
                'required','numeric'
            ],
            'Opis'=> [
                'required'
            ],
            'status'=> [
                'required'
            ],
           
        ];
    }
}
