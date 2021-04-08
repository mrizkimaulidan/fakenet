<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'client_id' => 'integer',

            'day' => 'required',
            'month' => 'required',
            'year' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'client_id.integer' => 'Kolom klien wajib diisi!',

            'day.required' => 'Kolom hari wajib diisi!',
            'month.required' => 'Kolom bulan wajib diisi!',
            'year.required' => 'Kolom tahun wajib diisi!'
        ];
    }
}
