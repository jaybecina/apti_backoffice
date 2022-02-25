<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactUsRequest extends FormRequest
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
            'location'              => 'required|max:100',
            'address'               => 'required|max:100',
            'telephone_number'      => 'required|max:25',
            'cellphone_number'      => 'required|max:25',
            'email_address'         => 'required|max:50',
            'website_url'           => 'required|max:100',
        ];
    }
}
