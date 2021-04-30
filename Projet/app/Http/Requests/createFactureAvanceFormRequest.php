<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createFactureAvanceFormRequest extends FormRequest
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
            'num_facture'=>'required',
            'objet'=>'required',
            'date_facture'=>'required',
            'date_reception'=>'required'
        ];
    }
}
