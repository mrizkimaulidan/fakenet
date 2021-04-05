<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInternetPackageRequest extends FormRequest
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
            'name' => 'required|min:3|max:191',
            'price' => 'required|integer'
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
            'name.required' => 'Kolom nama paket wajib diisi!',
            'name.min' => 'Kolom nama paket minimal :min karakter!',
            'name.max' => 'Kolom nama paket maksimal :max karakter!',

            'price.required' => 'Kolom harga wajib diisi!',
            'price.integer' => 'Kolom harga harus angka!'
        ];
    }
}
