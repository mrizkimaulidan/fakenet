<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdministratorApplicationRequest extends FormRequest
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
            'position_id' => 'integer',
            'name' => 'required|min:3|max:191',
            'email' => 'required|email|max:191',
            'password' => 'required|min:3|max:191|confirmed',
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
            'position_id.integer' => 'Kolom jabatan wajib diisi!',

            'name.required' => 'Kolom nama wajib diisi!',
            'name.min' => 'Kolom nama minimal :min karakter!',
            'name.max' => 'Kolom nama maksimal :max karakter!',

            'email.required' => 'Kolom email wajib diisi!',
            'email.email' => 'Kolom email harus format email yang valid!',
            'email.max' => 'Kolom email maksimal :max karakter!',

            'password.required' => 'Kolom password wajib diisi!',
            'password.min' => 'Kolom password minimal :min karakter!',
            'password.max' => 'Kolom password maksimal :max karakter!',
            'password.confirmed' => 'Kolom ulangi password tidak sama!'
        ];
    }
}
