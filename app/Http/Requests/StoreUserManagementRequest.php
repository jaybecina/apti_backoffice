<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserManagementRequest extends FormRequest
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
            'email'             =>  'required|unique:users|email',
            'first_name'        =>  'required|max:50',
            'middle_name'       =>  'required|max:50',
            'last_name'         =>  'required|max:50',
            'contact_number'    =>  'required|numeric|min:11',
            'password'          =>  'required_without:cb_gen_pass|confirmed|min:6',
            'role'              =>  'required',
            'profile_picture'   =>  'mimes:png,jpg,jpeg',
        ];
    }
    public function messages()
    {
        return [
            'password.required_without' => 'The :attribute is required.',
        ];
    }
}
