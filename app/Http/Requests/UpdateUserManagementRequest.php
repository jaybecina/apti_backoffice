<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserManagementRequest extends FormRequest
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
        // $id = $this->route('id');

        return [
            'email'             =>  'required|email|unique:users,email,'.$this->id,
            'first_name'        =>  'required|max:50',
            'middle_name'       =>  'required|max:50',
            'last_name'         =>  'required|max:50',
            'contact_number'    =>  'required|numeric|min:11',
            'role'              =>  'required',
            'profile_picture'   =>  'mimes:png,jpg,jpeg',
        ];
    }
}
